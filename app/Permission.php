<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  protected $fillable = [
      'label','name_permission',
  ];

  public function roles(){
  	return $this->belongsToMany('\App\Role');
  }

}
