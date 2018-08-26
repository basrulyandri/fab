<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use App\Permission;

class PermissionController extends Controller
{
    public function index(){
      $permissions = \App\Permission::all();
      $count = 1;
      return view('permissions.index',compact('permissions','count'));

    }

    public function add(){
      $roles  = Role::all();
      return view('permissions.add',compact(['roles']));
    }

    public function create(Request $request){
      $this->validate($request,[
        'label' => 'required',
        'name_permission' => 'required|unique:permissions',
      ]);
      
      $permission = \App\Permission::create($request->all());
      if($request->input('roles')){
            $permission->roles()->sync($request->input('roles'));
      }

      return redirect('permissions')->with('success','1 Permission has been created');
    }

    public function edit($id){
      $permission = \App\Permission::findOrFail($id);
      return view('permissions.edit',compact('permission'));
    }

    public function update(Permission $permission,Request $request)
    {

      //dd($request->all());
      $permission->update($request->all());
      return redirect()->route('permissions.index')->with('success','Permission has been updated successfully.');
    }

    public function delete($id)
    {
      $permission = \App\Permission::findOrFail($id);
      $permission->roles()->detach();
      $permission->delete($id);
      return redirect()->route('permissions.index')->with('success','Permission has been deleted successfully.');

    }
}
