<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function general()
    {
    	return view('settings.general');
    }

    public function aplikan()
    {
    	return view('settings.aplikan');
    }

    public function akademik()
    {
    	return view('settings.akademik');
    }

    public function mailing()
    {
        $list_user_notifikasi_dowload_brosur = unserialize(getOption('list_user_notifikasi_dowload_brosur'));
        //dd($list_user_notifikasi_dowload_brosur);
        return view('settings.mailing',compact('list_user_notifikasi_dowload_brosur'));
    }
}
