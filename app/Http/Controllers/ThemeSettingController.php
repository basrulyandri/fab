<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;

class ThemeSettingController extends Controller
{
	public function general()
	{
		return view('themeoptions.general');
	}

	public function featuredprogram()
	{
		return view('themeoptions.featuredprogram');
	}

	public function slider()
	{
		$slider_contents = unserialize(getOption('theme_option_slider_contents'));				
		return view('themeoptions.slider',compact(['slider_contents']));
	}

	public function sambutan()
	{		
		return view('themeoptions.sambutan');
	}

	public function update(Request $request)
	{
		//dd($request->all());
		foreach($request->except(['_token']) as $key => $value){
			if(is_array($value)){
				$value = serialize($value);
			}
			Option::whereOptionKey($key)->update(['option_value' => $value]);
		}

		return redirect()->back()->with('success','Options has been Updated Successfully');
	}


}
