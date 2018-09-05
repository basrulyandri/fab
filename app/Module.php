<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $guarded = ['id'];
    
    protected $fillable = [ "title","description","courseitem_id","datetime", ];

}