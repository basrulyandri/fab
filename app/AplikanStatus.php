<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AplikanStatus extends Model
{
    protected $table = 'aplikan_status';

    public function aplikan()
    {
    	return $this->hasMany(Aplikan::class);
    }
}
