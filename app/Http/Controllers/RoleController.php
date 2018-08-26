<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RoleController extends Controller
{
    public function index(){
    	$roles = \App\Role::all();
    	return view('roles.index',['roles' => $roles,'no' => 1]);
    }

    public function add()
    {
        $allpermissions = \App\Permission::all();
        return view('roles.add',compact('allpermissions'));
    }

    public function create(Request $request)
    {
        $role = \App\Role::create($request->all());

        if($request->input('perms')){
            $role->permissions()->sync($request->input('perms'));
        }
        

        return redirect()->route('roles.index')->with('success','1 Role has been created');
    }

    public function edit($id){

    	$role = \App\Role::findOrFail($id);
        $rolepermissions = $role->permissions()->pluck('name_permission','permissions.id');
    	return view('roles.edit',['role' => $role,'rolepermissions'=>$rolepermissions,'allpermissions' => \App\Permission::all()]);
    }

    function update($id, Request $request){

        //dd($request->all());
    	
        $role = \App\Role::findOrFail($id);    	   	
    	if($request->input('perms')){
    	   $role->permissions()->sync($request->input('perms'));
        }
       
    	
    	$role->update(['name' => $request->input('name')]);

    	return redirect()->route('roles.index')->with('success','Edit Role Successfully');
    }

    public function delete($id)
    {
      $role = \App\Role::findOrFail($id);
      $role->permissions()->detach();
      $role->delete($id);
      return redirect()->route('roles.index')->with('success','Role has been deleted successfully.');

    }
}
