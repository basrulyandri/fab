<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihan';
    protected $fillable = ['nama_biaya','object_id','object_name','nominal','keterangan','semester','status'];

    public function object()
    {
    	if($this->object_name == 'aplikan'){
    		return $this->belongsTo(Aplikan::class);
    	}
    }

    public function biaya()
    {
    	return $this->belongsTo(Biaya::class);
    }

    public function aplikan()
    {
        if($this->object_name == 'aplikan'){
            return $this->belongsTo(Aplikan::class,'object_id');            
        }

        return NULL;
    }
}
