<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Translatable;

class Level extends Model
{
	use Sluggable, Translatable;

    protected $table = 'levels';
    protected $guarded = ['id'];
    
    protected $fillable = [ "title","description","slug",'thumbnail','excerpt'];

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
    
    public function courses()
    {
    	return $this->hasMany(Course::class);
    }
}