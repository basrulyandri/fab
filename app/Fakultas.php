<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'fakultas';

    public function prodi()
    {
    	return $this->hasMany(Prodi::class);
    }

    public function pt()
    {
    	return $this->belongsTo(Pt::class);
    }
}
