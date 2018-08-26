<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PtOption;

class SettingKampusController extends Controller
{
	public function general()
	{
		// dd(serialize([
		// 	1 => 'Tunai',
		// 	2 => 'Mandiri'
		// 	]));
		return view('settings.kampus.general');
	}

	public function jurusan()
	{
		return view('settings.kampus.jurusan');	
	}

	public function pembayaran()
	{
		$bayarVia = getPtOption('bayar_via',true);
		return view('settings.kampus.pembayaran',compact(['bayarVia']));
	}

	public function update(Request $request)
	{
		dd($request->all());
		foreach($request->except(['_token']) as $key => $value){
			$option = PtOption::whereOptionKey($key)->first();
			$option->update(['option_value' => $value]);
		}

		return redirect()->back()->with('success','Pengaturan berhasil di update');
	}
}
