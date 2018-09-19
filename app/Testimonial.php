<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $guarded = ['id'];
    
    protected $fillable = [ "name","position_title","course","body",'thumbnail'];

}