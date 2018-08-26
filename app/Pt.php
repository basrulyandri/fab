<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pt extends Model
{

	protected $table = 'pt';
    public function users()
    {
    	return $this->hasMany(\App\User::class);
    }

    public function aplikan()
    {
    	return $this->hasMany(\App\Aplikan::class);
    }

    public function fakultas()
    {
    	return $this->hasMany(Fakultas::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function konsentrasi()
    {
    	$konsentasiArray = [];
    	foreach($this->fakultas as $fakultas){
    		foreach ($fakultas->prodi as $prodi) {
    			foreach ($prodi->konsentrasi as $konsentrasi) {
    				$konsentrasiArray[] = [
    					'id' => $konsentrasi->id,
    					'nama' => $konsentrasi->nama
    				];
    			}
    		}
    	}
    	return collect($konsentrasiArray);
    }
}
