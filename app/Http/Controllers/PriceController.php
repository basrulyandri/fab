<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;

class PriceController extends Controller
{
    public function store(Request $request)
    {
    	//dd($request->all());
    	Price::create($request->all());
    	return redirect()->back()->with('success','Fee has been added successfully.');
    }

    public function edit(Price $price)
    {    	
    	return view('prices.edit',compact(['price']));
    }

    public function update(Request $request, Price $price)
    {        
        $price->update($request->all());

        return redirect()->route('courses.show',$price->course)->with('success','Fee has been updated Successfully');
    }
}
