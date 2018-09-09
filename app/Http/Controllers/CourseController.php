<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function index()
    {        
        $courses = Course::paginate(20);
        return view('courses.index',compact(['courses']));
    }

    public function create(){
        return view('courses.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $course = Course::create($request->all());

        return redirect()->back()->with('success','Product has been created Successfully');
    }

    public function show(Course $course)
    {        

        return view('courses.show',compact(['course']));
    }

    public function edit(Course $course)
    {        
        return view('courses.edit',compact(['course']));
    }

    public function update(Request $request, Course $course)
    {        
        $course->update($request->all());

        return redirect()->route('courses.index')->with('success','Product has been updated Successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success','Product has been deleted Successfully');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;        
        \DB::table("courses")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Courses Deleted successfully."]);
    }
}