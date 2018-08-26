<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';

    public function konsentrasi()
    {
    	return $this->hasMany(Konsentrasi::class);
    }
}
