<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Image;

class UserController extends Controller
{
    public function index(){
    	$users = User::paginate(10);
    	return view('users.index',['users' => $users,'no' => 1]);
    }

    public function add(){
      $roles = \App\Role::pluck('name','id')->toArray();
      $roles = array_prepend($roles,'Select Role','');
      //dd($roles);
      return view('users.add',compact('roles'));
    }

    public function create(Request $request){
      $this->validate($request, [
        'username' => 'required|unique:users|min:3',
        'email' => 'required|email|unique:users',
        'role_id' => 'required',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required',        
      ]);

      //dd($request->all());

      if($request->hasFile('photo')){
        $photo = $request->file('photo');
        $filename = time().$photo->getClientOriginalName();
        //dd(public_path());

        if(!Image::make($photo)->resize(150,150)->save(public_path('uploads/user-photos/'.$filename))){
          return 'not uploaded';
        }
      }

      $user =  new User;

      $user->username = $request->input('username');
      $user->email = $request->input('email');
      $user->password = bcrypt($request->input('password'));
      $user->role_id = $request->input('role_id');
      $user->api_token = str_random(60);
      $user->activated = 1;
      $user->photo = (isset($filename)) ? $filename :null;
      $user->phone = $request->input('phone');
      $user->about = $request->input('about');
      $user->facebook_url = $request->input('facebook_url');
      $user->twitter_url = $request->input('twitter_url');
      $user->google_plus_url = $request->input('google_plus_url');      
      $user->save();      
      

      return redirect()->route('users.index')->with('success','User has been created successfully');
    }

    public function edit(User $user)
    {
      $roles = \App\Role::pluck('name','id')->toArray();
      $roles = array_prepend($roles,'Select Role','');
      return view('users.edit',compact(['roles','user']));
    }

    public function update(Request $request,User $user)
    {      
      if($request->password != ''){
        $password = $request->password;
        $request->merge(['password' => bcrypt($password)]);        
        $user->update($request->all());
      }else{
        $user->update($request->except(['password']));
      }     

      return redirect()->route('user.profile',['username'=>$user->username])->with('success','User has been successfully updated');
    }

    public function delete(User $user)
    {
      $user->delete();
      return redirect()->route('users.index')->with('success','User has been deleted');
    }

    public function profile($username)
    {
      $user = User::where('username',$username)->firstOrfail();
      if(!$user){
        return redirect()->route('error.404');
      }
      return view('users.profile',['user' => $user]);
    }

    public function updatePhoto(Request $request)
    {
      $this->validate($request, [
        'photo' => 'required',
      ]);      
      

      $photo = $request->file('photo');
      $filename = time().$photo->getClientOriginalName();
      
      if(!Image::make($photo)->resize(150,150)->save(public_path('assets/uploads/user-photos/'.$filename))){
        return 'not uploaded';
      }

      $user = User::findOrFail($request->input('id'));

      $user->photo = $filename;
      $user->save();

      return redirect()->back();
    }

    public function myprofile()
    {
      $user = User::findOrFail(\Auth::user()->id);
      //dd($user);
      return view('users/myprofile',compact(['user']));
    }

    public function myprofilepembayaran()
    {
       $user = User::findOrfail(\Auth::user()->id);

        return view('users.pembayaran',compact(['user']));
    }

    public function myprofiletagihan()
    {
      $user = \Auth::user();
      $tagihan = \App\Tagihan::whereMahasiswaId($user->mahasiswa->id)->get();
      return view('users.tagihan',compact(['tagihan','user']));
    }

    public function myprofilekhs()
    {
      $user = \Auth::user();
      return view('users.khs',compact(['user']));
    }

    public function myprofilekrs()
    {
      $user = \Auth::user();
      $krs = \App\Krs::whereMahasiswaId(\Auth::user()->mahasiswa->id)->orderBy('created_at','desc')->get();      
      return view('users.krs',compact(['krs','user']));
    }

    public function ajaxdetailbayar(Request $request)
    {
      $tagihan = \App\Tagihan::find($request->input('tagihan_id'));
      $view = view('users/ajaxdetailbayar',compact(['tagihan']))->render();
      return response()->json(['msg' => 'Berhasil','view' => $view]);
    }

    public function ajaxkonfirmasipembayaran(Request $request)
    {
      $via = \App\PembayaranVia::select(\DB::raw("CONCAT(nama,' ',nama_bank,' ',atas_nama,' ',no_rekening) AS fullrekening, id"))->where('nama','!=','Tunai')->lists('fullrekening','id')->prepend('Pilih Rekening','')->toArray();
      $tagihan = \App\Tagihan::find($request->input('tagihan_id'));      
      $view = view('users/ajaxformkonfirmasipembayaran',compact(['tagihan','via']))->render();
      return response()->json(['msg' => 'Berhasil','view' => $view]);
    }

    public function postmelayaniaplikan(Request $request)
    {
        $aplikan = \App\Aplikan::find($request->aplikan_id);
        $aplikan->dilayaniOleh()->attach(\Auth::user(),['keterangan' => $request->keterangan]);        

        return redirect()->back()->with('success','Input Hasil Melayani Berhasil');
    }

}
