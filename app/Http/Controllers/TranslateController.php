<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Translation;

class TranslateController extends Controller
{
	public function ajaxTranslateModal(Request $request)
	{	
		//dd($request->all());
		$translate = Translation::whereForeignKeyId($request->foreign_key_id)->whereTableName($request->table_name)->whereFieldName($request->field_name)->first();
		if($translate){
			$content = $translate->content;
		}else{
			$content = '';
		}		
		$html = view('translates.ajaxtranslateform',compact(['request','content']))->render();
		return response()->json(['msg' => 'success','html' => $html],200);
	}

	public function update(Request $request)
	{
		$translate = Translation::whereForeignKeyId($request->foreign_key_id)->whereTableName($request->table_name)->whereFieldName($request->field_name)->first();
		//dd($translate);

		if($translate){
			$translate->update([
				'content' => $request->content
			]);
		}else{
			Translation::create($request->all());			
		}
		//dd($request->all());
		return redirect()->back()->with('success','Translate has been saved');
	}
}
