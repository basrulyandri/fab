<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class AuthController extends Controller
{
    
    public function login(){
    	return view('auth.login');
    }

    public function dologin(Request $request){
    	$this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);  
    	if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')])){
                \Log::useDailyFiles(storage_path().'/logs/app.log');
                \Log::info('User "'.auth()->user()->username.'" successfully login.');
                return redirect()->intended('/dashboard');
            }                      
        \Log::useDailyFiles(storage_path().'/logs/app.log');
        \Log::warning('A user is failed to login.');
        return redirect()->route('auth.login')->withInput();
    }
    

    public function logout(){
        \Log::useDailyFiles(storage_path().'/logs/app.log');
        \Log::info('User "'.auth()->user()->username.'" successfully logout.');
    	Auth::logout();
    	return redirect()->route('page.index');
    }

    public function error401(){
    	return view('errors.401');
    }

    public function resetpassword($reset_password_code)
    {
        $user = \App\User::whereResetPasswordCode($reset_password_code)->first();
        if(!$user){
            return redirect()->route('auth.login');
        }

        return view('auth.resetpassword',compact('reset_password_code'));
        
    }

    public function postresetpassword(Request $request,$reset_password_code)
    {
        $this->validate($request, [
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);  

        $user = \App\User::whereResetPasswordCode($reset_password_code)->first();

        $user->password = bcrypt($request->input('password'));

        $user->save();

        return redirect()->route('auth.login')->with('message','Password berhasil dirubah, Silahkan Login dengan password baru');        
    }    

}
