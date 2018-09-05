<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courseitem;

class CourseitemController extends Controller
{
    public function index()
    {        
        $courseitems = Courseitem::paginate(20);
        return view('courseitems.index',compact(['courseitems']));
    }

    public function create(){
        return view('courseitems.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'course_id' => 'required|size:1',

        ]);
        //dd($request->all());
        $courseitem = Courseitem::create($request->all());

        return redirect()->back()->with('success','Product has been created Successfully');
    }

    public function show(Courseitem $courseitem)
    {        

        return view('courseitems.show',compact(['courseitem']));
    }

    public function edit(Courseitem $courseitem)
    {        
        return view('courseitems.edit',compact(['courseitem']));
    }

    public function update(Request $request, Courseitem $courseitem)
    {        
        $courseitem->update($request->all());

        return redirect()->route('courseitems.index')->with('success','Product has been updated Successfully');
    }

    public function destroy(Courseitem $courseitem)
    {
        $courseitem->delete();

        return redirect()->route('courseitems.index')->with('success','Product has been deleted Successfully');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;        
        \DB::table("courseitems")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Courseitems Deleted successfully."]);
    }
}