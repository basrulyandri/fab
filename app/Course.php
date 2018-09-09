<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Translatable;

class Course extends Model
{
	use Sluggable, Translatable;

    protected $table = 'courses';
    protected $guarded = ['id'];
    
    protected $fillable = [ "title","description","slug",'thumbnail' ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function translation()
    {
        return $this->hasMany(Translation::class,'foreign_key_id');
    }
    
    public function items()
    {
    	return $this->hasMany(Courseitem::class,'course_id');
    }
}