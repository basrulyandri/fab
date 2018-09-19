<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;

class LevelController extends Controller
{
    public function index()
    {        
        $levels = Level::paginate(20);
        return view('levels.index',compact(['levels']));
    }

    public function create(){
        return view('levels.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $course = Level::create($request->all());

        return redirect()->back()->with('success','Product has been created Successfully');
    }

    public function show(Level $level)
    {        

        return view('levels.show',compact(['level']));
    }

    public function edit(Level $level)
    {        
        return view('levels.edit',compact(['level']));
    }

    public function update(Request $request, Level $level)
    {        
        $course->update($request->all());

        return redirect()->route('levels.index')->with('success','Product has been updated Successfully');
    }

    public function destroy(Level $level)
    {
        $level->courses->delete();
        $level->delete();

        return redirect()->route('levels.index')->with('success','Level has been deleted Successfully');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;        
        \DB::table("levels")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Courses Deleted successfully."]);
    }
}