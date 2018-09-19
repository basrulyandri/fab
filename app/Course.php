<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Translatable;

class Course extends Model
{
    use Sluggable, Translatable;
    protected $guarded = ['id'];
    
    protected $fillable = [ "title","description","level_id",'thumbnail','excerpt'];

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
    
    public function level()
    {
    	return $this->belongsTo(Level::class);
    }

    public function modules()
    {
    	return $this->hasMany(Module::class,'course_id');
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}