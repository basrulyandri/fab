<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable =['user_id','order_id','item_id','amount','paying_date','method','status','description'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

    public function item()
    {
    	return $this->belongsTo(Item::class);
    }
}
