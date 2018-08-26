<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'districts';

    public function kelurahan()
    {
    	return $this->hasMany('App\Kelurahan');
    }

    public function kabupaten()
    {
    	return $this->belongsTo('App\Kabupaten','regency_id');
    }
}
