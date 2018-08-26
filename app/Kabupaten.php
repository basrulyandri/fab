<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'regencies';

    public function provinsi()
    {
    	return $this->belongsTo('App\Provinsi','province_id');
    }
}
