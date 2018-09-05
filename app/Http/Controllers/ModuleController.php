<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;

class ModuleController extends Controller
{
    public function index()
    {        
        $modules = Module::paginate(20);
        return view('modules.index',compact(['modules']));
    }

    public function create(){
        return view('modules.create');
    }

    public function store(Request $request)
    {
        $module = Module::create($request->all());

        return redirect()->back()->with('success','Product has been created Successfully');
    }

    public function show(Module $module)
    {        

        return view('modules.show',compact(['module']));
    }

    public function edit(Module $module)
    {        
        return view('modules.edit',compact(['module']));
    }

    public function update(Request $request, Module $module)
    {        
        $module->update($request->all());

        return redirect()->route('modules.index')->with('success','Product has been updated Successfully');
    }

    public function destroy(Module $module)
    {
        $module->delete();

        return redirect()->route('modules.index')->with('success','Product has been deleted Successfully');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;        
        \DB::table("modules")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Modules Deleted successfully."]);
    }
}