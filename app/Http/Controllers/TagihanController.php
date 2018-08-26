<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\Tagihan;
use App\Aplikan;

class TagihanController extends Controller
{
    public function index()
    {
    	$tertagih = \App\Tagihan::whereStatus('tertagih')->get();
    	return view('tagihan.index',compact(['tertagih']));
    }

    public function bayar(Request $request)
    {
    	$tagihan = Tagihan::find($request->tagihan_id);

    	if(!$tagihan){
    		return redirect()->back()->with('danger','Tagihan Tidak Terdaftar');
    	}
        $request->request->add(['user_id' => auth()->user()->id]);
    	$Pembayaran = Pembayaran::create($request->all());

    	$tagihan->status = 'dibayar';
    	$tagihan->save();

    	if($tagihan->object_name == 'aplikan'){
	    	$aplikan = Aplikan::find($tagihan->object_id);
	    	if($tagihan->nama_biaya == 'Pendaftaran'){
		    	$aplikan->aplikan_status_id = 3;
                $aplikan->tanggal_terdaftar = \Carbon\Carbon::now();
	    	}
            if($tagihan->nama_biaya == 'Registrasi'){
                $aplikan->aplikan_status_id = 4;
                $aplikan->tanggal_teregistrasi = \Carbon\Carbon::now();
            }
            $aplikan->status_detail = null;
            $aplikan->save();               
    	}
    	return redirect()->back()->with('success','Tagihan Berhasil dibayar');
    }
}
