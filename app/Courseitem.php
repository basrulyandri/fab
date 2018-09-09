<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Translatable;

class Courseitem extends Model
{
    use Sluggable, Translatable;
    protected $guarded = ['id'];
    
    protected $fillable = [ "title","description","course_id",'thumbnail' ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function modules()
    {
    	return $this->hasMany(Module::class,'courseitem_id');
    }
}