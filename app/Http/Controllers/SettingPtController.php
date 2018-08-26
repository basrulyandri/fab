<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingPtController extends Controller
{
    public function general()
    {
    	return view('settingspt.general');
    }

    public function update(Request $r)
    {
    	// $pt_options = \App\PtOption::where('pt_id','=',\Auth::user()->pt_id)->get();
    	//dd($r->all());
    	foreach($r->all() as $key => $value){
    		if($key != '_token'){    			
	    		$pt_option = \App\PtOption::where('pt_id','=',\Auth::user()->pt_id)->whereOptionKey($key)->first();    		
	    		if($pt_option){
	    			$pt_option->option_value = $value;
	    			$pt_option->save();
	    		}else{
	    			$new_option = new \App\PtOption;
	    			$new_option->pt_id = \Auth::user()->pt_id;
	    			$new_option->option_key = $key;
	    			$new_option->option_value = $value;
	    			$new_option->save();
	    		}
    		}
    	}

    	return redirect()->back();
    }

    public function prodi()
    {
        return view('settingspt.prodi');
    }
}
