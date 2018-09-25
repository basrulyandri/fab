<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','total_qty','total_price','status','validated'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function course()
    {
        $courses = $this->items->map(function($item){
            return Course::find($item->course_id);
        });

        return $courses;
    }
}
