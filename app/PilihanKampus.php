<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PilihanKampus extends Model
{
    protected $table = 'pilihan_kampus';

    public function pt()
    {
    	return $this->belongsTo(Pt::class);
    }
}
