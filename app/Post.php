<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Translatable;

class Post extends Model
{

    use Sluggable, Translatable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    protected $table = 'posts';
    protected $dates = ['published_at'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function categories()
    {
    	return $this->belongsToMany('App\Category');
    }

    public function translation()
    {
        return $this->hasMany(Translation::class,'foreign_key_id');
    }

    public function categories_comma($link = false)
    {
    	$cats = $this->categories;
    	$categories = '';
        $count = $cats->count();
        $i = 0;
        if($link){
            foreach($cats as $cat){
                if($i + 1 == $count){
                    $categories .= '<a href="'.url('/').'/category/'.$cat->name.'">'.$cat->label.'</a>';
                }else{
                    $categories .= '<a href="'.url('/').'/category/'.$cat->name.'">'.$cat->label.'</a>, ';
                }
                $i++;   
            } 
        }else{
            foreach($cats as $cat){
                if($i + 1 == $count){
                    $categories .= $cat->label;
                }else{
                    $categories .= $cat->label.', ';
                }
                $i++;   
            }    
               
        }
    	
    	return $categories;
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function tags_comma()
    {
    	$t = $this->tags;
    	$tags = '';
        $count = $t->count();
        $i = 0;
    	foreach($t as $tag){
    		if($i + 1 == $count){
                $tags .= $tag->label;
            }else{
                $tags .= $tag->label.',';
            }
            $i++;                
    	}
    	return $tags;
    }

    public function thumb()
    {
        return '/photos/thumbs'.substr($this->thumbnail,7);
    }

    public function thumbnail()
    {
        if($this->thumbnail){
            return $this->thumbnail;
        }

        return '/assets/backend/img/no-thumbnail.jpg';
    }

    public function thumbnailObject()
    {
        return  Post::whereType('attachment')->where('media_type','=','image/jpeg')->where('parent','=',$this->id)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
