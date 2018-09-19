<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {        
        $testimonials = Testimonial::paginate(20);
        return view('testimonials.index',compact(['testimonials']));
    }

    public function create(){
        return view('testimonials.create');
    }

    public function store(Request $request)
    {
        $testimonial = Testimonial::create($request->all());

        return redirect()->back()->with('success','Product has been created Successfully');
    }

    public function show(Testimonial $testimonial)
    {        

        return view('testimonials.show',compact(['testimonial']));
    }

    public function edit(Testimonial $testimonial)
    {        
        return view('testimonials.edit',compact(['testimonial']));
    }

    public function update(Request $request, Testimonial $testimonial)
    {        
        $testimonial->update($request->all());

        return redirect()->route('testimonials.index')->with('success','Product has been updated Successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success','Product has been deleted Successfully');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;        
        \DB::table("testimonials")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Testimonials Deleted successfully."]);
    }
}