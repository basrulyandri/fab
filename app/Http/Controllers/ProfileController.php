<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function my()
    {
    	$user = auth()->user();
      
      	return view('profiles.my',compact(['user']));
    }

    public function edit()
    {
    	$user = auth()->user();
    	return view('profiles.edit',compact(['user']));
    }

    public function update(Request $request)
    {
        if($request->password != ''){
            $password = $request->password;
            $request->merge(['password' => bcrypt($password)]);        
            auth()->user()->update($request->all());
        }else{
            auth()->user()->update($request->except(['password']));
        }     

      return redirect()->route('my.profile')->with('success','Your profile has been updated successfully');
    }

    public function changepicture(Request $request)
    {
    	//dd($request->all());
    	$user = auth()->user();
    	$user->photo = $request->photo;
    	$user->save();
    	return redirect()->back()->with('success','Profile picture has been change successfully');    	
    }
}
