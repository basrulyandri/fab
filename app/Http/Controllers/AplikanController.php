<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aplikan;
use App\User;

class AplikanController extends Controller
{
    public function index(Request $request)
    {

    	if($request->input('short_by')){
    		$aplikan = Aplikan::orderBy($request->input('short_by'),'asc')->whereTanggalTake(null)->whereAplikanStatusId(2)->paginate(10);
    		$links = $aplikan->appends(['short_by' => $request->input('short_by')])->links();		
    	}else{
    		$aplikan = Aplikan::orderBy('tanggal_daftar','desc')->whereTanggalTake(null)->whereAplikanStatusId(2)->paginate(10);
    		$links = $aplikan->links();	    		
    	}
    	return view('aplikan.index',compact('aplikan','links'));
    }

    public function saya(Request $request)
    {

        if($request->input('short_by')){
            $aplikan = Aplikan::orderBy($request->input('short_by'),'asc')->whereNotNull('tanggal_take')->whereUserId(\Auth::user()->id)->paginate(10);
            $links = $aplikan->appends(['short_by' => $request->input('short_by')])->links();      
        }else{

            $aplikan = Aplikan::orderBy('tanggal_take','desc')->whereNotNull('tanggal_take')->whereUserId(\Auth::user()->id)->paginate(10);
            $links = $aplikan->links();                         
        }        
        return view('aplikan.saya',compact(['aplikan','links']));
    }

    public function ajaxtake(Request $request)
    {
        if(auth()->user()->hasReachLimitTakeAplikanPerDay()){
            return response()->json(['status' => 'failed','aplikan' => null]);            
        }
        $aplikan = Aplikan::find($request->input('idaplikan'));
        $user = \Auth::user();

        $aplikan->tanggal_take = \Carbon\Carbon::now();
        $aplikan->user_id = $user->id;
        $aplikan->save();

        \App\AplikanTrack::create([
                'aplikan_id' => $aplikan->id,
                'nama_proses' => 'taken',
                'user_id' => $user->id
            ]);
        \Log::useDailyFiles(storage_path().'/logs/app.log');
        \Log::info(auth()->user()->username.' successfully take aplikan '.$aplikan->nama.' ('.$aplikan->id.')');
        return response()->json(['status' => 'success','aplikan' => $aplikan]);
    }

    public function ajaxrelease(Request $request)
    {        
        $aplikan = Aplikan::find($request->input('idaplikan'));
        $user = \Auth::user();
        
        $aplikan->tanggal_take = null;
        $aplikan->user_id = null;
        $aplikan->save();

        \App\AplikanTrack::create([
                'aplikan_id' => $aplikan->id,
                'nama_proses' => 'released',
                'user_id' => $user->id
            ]);

        return response()->json(['status' => 'success','aplikan' => $aplikan]);
    }

    public function postfollowedup(Request $r)
    {
        //dd($r->all());
        $aplikan = Aplikan::find($r->input('aplikan_id'));
        if($aplikan->user_id == \Auth::user()->id){
            $aplikan->followedUpBy()->attach(\Auth::user(),['keterangan' => $r->input('keterangan')]);
            \Log::useDailyFiles(storage_path().'/logs/app.log');
            \Log::info(auth()->user()->username.' memfollow up aplikan '.$aplikan->nama);
            return redirect()->back()->with('success','Input Followup berhasil');
        }else{
            return redirect()->back()->with('error','Anda tidak bisa memfollow up yang bukan aplikan anda. Coba tekan tombol Layani.');
        }        
    }

    public function view(Aplikan $aplikan)
    {    
        if(!$aplikan->isMine(auth()->user()->id)){
            return redirect()->route('aplikan.saya')->with('danger','Aplikan ini tidak bisa anda akses');
        }
        $followedup = $aplikan->followedUpBy()->orderBy('followup.created_at','desc')->paginate(10);         
        return view('aplikan.view',compact(['aplikan','followedup']));
    }

    public function detail(Aplikan $aplikan)
    {
        $followedup = $aplikan->followedUpBy()->orderBy('followup.created_at','desc')->paginate(10);         
        return view('aplikan.detail',compact(['aplikan','followedup']));   
    }

    public function edit(Aplikan $aplikan)
    {
        if(!$aplikan->isMine(auth()->user()->id)){
            return redirect()->route('aplikan.saya')->with('danger','Aplikan ini bukan aplikan anda, tidak bisa diedit.');
        }

        $pt_id = auth()->user()->pt_id;
        $konsentrasi = \App\Konsentrasi::all();
        $kelasOptions = \App\Kelas::pluck('nama','id');
        $pilihanKampusOptions = \App\PilihanKampus::pluck('nama_kampus','id');        
        
        return view('aplikan.edit',compact(['konsentrasi','kelasOptions','pilihanKampusOptions','aplikan']));
    }

    public function update(Aplikan $aplikan, Request $request)
    {
        if(!$aplikan->isMine(auth()->user()->id)){
            return redirect()->route('aplikan.saya')->with('danger','Aplikan ini tidak bisa anda akses');
        }
        //dd($request->all());
        $aplikan->update($request->all());
        return redirect()->back()->with('success','Aplikan has been updated successfully.');
    }
    public function all(Request $request)
    {
        //dd($request->all());
        if($request->has('nama')){
            if($request->has('aplikan_status_id')){
                $aplikan = Aplikan::where('nama','LIKE','%'.$request->nama.'%')->whereAplikanStatusId($request->aplikan_status_id)->orderBy('created_at','desc')->paginate(20);
            }else {
                $aplikan = Aplikan::where('nama','LIKE','%'.$request->nama.'%')->orderBy('created_at','desc')->paginate(20);                
            }
        }else if($request->has('aplikan_status_id')){
            $aplikan = Aplikan::whereAplikanStatusId($request->aplikan_status_id)->orderBy('created_at','desc')->paginate(20);
        }else{
            $aplikan = Aplikan::orderBy('created_at','desc')->paginate(20);            
        }

        return view('aplikan.all',compact(['aplikan','request']));
    }

    public function daftarkan(Request $request)
    {
        //dd($request->all());
        //dd(User::find($request->presenter_id));
        $aplikan = Aplikan::find($request->aplikan_id);
        //Aplikan yang bisa didaftarkan harus berstatus aplikan dan status_detailnya NULL
        if($aplikan->status->id == 2 && $aplikan->status_detail == NULL){
            $aplikan->status_detail = 'pendaftaran';
            $aplikan->save();

            //kalau aplikan yang belum di take otomatis akan menjadi aplikan presenter yang mendaftarkan
            if(auth()->user()->isKeuangan()){
                if(!$aplikan->presenter){
                    $aplikan->user_id = $request->presenter_id;
                    $aplikan->save();
                }
                $aplikan->trackUser()->attach($request->presenter_id,['nama_proses' => 'pendaftaran']);
            }else{
                $aplikan->trackUser()->attach(\Auth::user(),['nama_proses' => 'pendaftaran']);                
            }

            $tagihan = \App\Tagihan::create([                    
                    'object_id' => $aplikan->id,
                    'object_name' => 'aplikan',
                    'nama_biaya' => 'Pendaftaran',
                    'nominal' => $request->nominal,
                    'keterangan' => $request->keterangan,
                    'status' => 'tertagih'
                ]);

            return redirect()->back()->with('success','Aplikan Berhasil Didaftarkan');
        }
        return redirect()->back()->with('danger','Aplikan tidak bisa didaftarkan. Cek lagi statusnya !');

    }

    public function registrasikan(Request $request)
    {
        //dd($request->all());
        $aplikan = Aplikan::find($request->aplikan_id);
        //Aplikan yang bisa didaftarkan harus berstatus aplikan dan status_detailnya NULL
        if($aplikan->status->id == 3 && $aplikan->status_detail == NULL){
            $aplikan->status_detail = 'proses-registrasi';
            $aplikan->save();
            if(auth()->user()->isKeuangan()){
                $aplikan->trackUser()->attach($request->presenter_id,['nama_proses' => 'registrasi']);
            }else{
                $aplikan->trackUser()->attach(\Auth::user(),['nama_proses' => 'registrasi']);                
            }

            $tagihan = \App\Tagihan::create([                    
                    'object_id' => $aplikan->id,
                    'object_name' => 'aplikan',
                    'nama_biaya' => 'Registrasi',
                    'nominal' => $request->nominal,
                    'keterangan' => $request->keterangan,
                    'status' => 'tertagih'
                ]);

            return redirect()->back()->with('success','Aplikan Berhasil Diregistrasikan');
        }
        return redirect()->back()->with('danger','Aplikan tidak bisa diregistrasikan. Cek lagi statusnya !');

    }   

    public function add()
    {
        $pt_id = auth()->user()->pt_id;
        $konsentrasi = \App\Konsentrasi::all();
        $kelasOptions = \App\Kelas::pluck('nama','id');
        $pilihanKampusOptions = \App\PilihanKampus::pluck('nama_kampus','id');
        //dd($konsentrasi);
        
        return view('aplikan.add',compact(['konsentrasi','kelasOptions','pilihanKampusOptions']));
    }

    public function postadd(Request $request)
    {
        $user = auth()->user();
        $request->request->add([
            'tanggal_daftar' => \Carbon\Carbon::now(), 
            'user_id' => $user->id,
            'aplikan_status_id' => 2,
            'status_detail' => NULL,
            'tanggal_take' => \Carbon\Carbon::now(),
            'token' => str_random(120),            
        ]);
        $aplikan = Aplikan::create($request->all());
        return redirect()->route('aplikan.view',['aplikan' => $aplikan])->with('success','Data Aplikan Baru berhasil diinput');
    }

    public function sayaImport(Request $request)
    {
        $data_baru = \Excel::load($request->file('file')->getPathName(), function($reader) {})->all();
        //dd($data_baru);

        $print_data_baru = '';
        $counter_data_baru = 0;        
        $data_dikirim_konfirmasi = [];
        $isDataValid = true;        

        foreach($data_baru as $b){
            if($b->email == ''){
                if($isDataValid){
                    $isDataValid = false;
                }
            }

            $data_lama = Aplikan::whereEmail($b->email)->first();
            if($data_lama){
                
                if($data_lama->email != $b->email){                                            
                    $data_dikirim_konfirmasi[] = $b;
                } 
            }

            if(!$data_lama){
                $counter_data_baru++;
                $data_dikirim_konfirmasi[] = $b;
            }                
        } 

        $data_dikirim_konfirmasi = collect($data_dikirim_konfirmasi);
        return view('aplikan.sayaimport',compact(['data_baru','counter_data_baru','data_dikirim_konfirmasi','isDataValid']));
    }

    public function sayaImportKonfirmasi(Request $request)
    {
        $data = json_decode($request->input('data_baru'));      
        //dd($data);
        $c = 0;

        foreach($data as $d){
            $aplikan = Aplikan::whereEmail($d->email)->first();
            if(!$aplikan){

                if(auth()->user()->isSuperadmin() || auth()->user()->isAdmin()){
                    $new_data = collect($d)->toArray();
                    Aplikan::create($new_data);
                } else {
                    $aplikan_baru = new Aplikan;   
                    $aplikan_baru->tanggal_daftar = \Carbon\Carbon::now();
                    $aplikan_baru->nama = $d->nama;
                    $aplikan_baru->jenis_kelamin = $d->jenis_kelamin;
                    $aplikan_baru->tempat_lahir = (property_exists($d,'tempat_lahir')) ? $d->tempat_lahir : NULL;
                    $aplikan_baru->tanggal_lahir = (property_exists($d,'tanggal_lahir')) ? $d->tanggal_lahir : NULL;
                    $aplikan_baru->agama = (property_exists($d,'agama')) ? $d->agama : NULL;
                    $aplikan_baru->email = $d->email;
                    $aplikan_baru->telepon = $d->telepon;
                    $aplikan_baru->alamat = (property_exists($d,'alamat')) ? $d->alamat : NULL;
                    $aplikan_baru->asal_sekolah = (property_exists($d,'asal_sekolah')) ? $d->asal_sekolah : NULL;
                    $aplikan_baru->jurusan_sekolah = (property_exists($d,'jurusan_sekolah')) ? $d->jurusan_sekolah : NULL;
                    $aplikan_baru->sumber_informasi = (property_exists($d,'sumber_informasi')) ? $d->sumber_informasi : NULL;
                    $aplikan_baru->aplikan_status_id = 2;
                    $aplikan_baru->konsentrasi_id = 1;
                    $aplikan_baru->kelas_id = 1;
                    if(auth()->user()->isPresenter()){
                        $aplikan_baru->user_id = auth()->user()->id;
                        $aplikan_baru->tanggal_take = \Carbon\Carbon::now();                    
                    }
                    
                    $aplikan_baru->save();
                }
                $c++;
            }            
        }

        return redirect()->route('aplikan.saya')->with('success','Import data berhasil');
    }

    public function downloadfileexcelimportaplikan()
    {
        //dd(\Storage::get('import-aplikan-example.csv'));
        return response()->download(public_path('import-aplikan-example.csv'));
    }
   
 }
