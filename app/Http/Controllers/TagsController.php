<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function search(Request $request)
    {
    	$tags = \App\Tag::select('name')->where('name','like',$request->input('tags').'%')->get();
    	return response()->json($tags);
    }
}
