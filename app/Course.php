<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Translatable;

class Course extends Model
{
	use Sluggable, Translatable;
    protected $guarded = ['id'];
    
    protected $fillable = [ "title","description","slug", ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function items()
    {
    	return $this->hasMany(Courseitem::class,'course_id');
    }
}