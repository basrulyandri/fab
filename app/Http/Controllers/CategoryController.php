<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addAjax(Request $request)
    {
    	$category = \App\Category::whereSlug($request->input('name'))->first();

    	if($category){
    		return response()->json(['msg' => 'Category Name already Exist.']);
    	}

    	$newCategory = \App\Category::create([    		
    		'label' => $request->input('name')
    	]);

    	$checkBox = '<div class="checkbox"><label><input type="checkbox" name="categories[]" value="'.$newCategory->id.'"> '.$newCategory->label.'</label></div>';
    	return response()->json(['checkbox' => $checkBox]);
    }
}
