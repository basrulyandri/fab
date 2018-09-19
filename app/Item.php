<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['course_id','order_id','qty','price'];

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
}
