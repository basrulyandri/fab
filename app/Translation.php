<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = ['foreign_key_id','table_name','field_name','content','language_code','is_html'];
}
