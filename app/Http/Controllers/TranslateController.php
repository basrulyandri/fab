<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Translation;

class TranslateController extends Controller
{
	public function ajaxTranslateModal(Request $request)
	{	
		$html = view('translates.ajaxtranslateform',compact(['request']))->render();
		return response()->json(['msg' => 'success','html' => $html],200);
	}

	public function update(Request $request)
	{
		//dd($request->all());
		Translation::create($request->all());
		return redirect()->back()->with('success','Translate has been saved');
	}
}
