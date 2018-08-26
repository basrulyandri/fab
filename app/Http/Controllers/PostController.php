<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class PostController extends Controller
{
    public function index()
    {
    	$posts = \App\Post::whereType('post')->orderBy('published_at','desc')->get();
    	return view('posts.index',compact(['posts']));
    }

    public function add()
    {        
    	$categories = \App\Category::all();    	
    	return view('posts.add',compact(['categories','projects']));
    }

    public function create(Request $request)
    {        
        $post = new \App\Post;
        $post->user_id = \Auth::user()->id;
        $post->published_at = \Carbon\Carbon::now();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->excerpt = $request->input('excerpt');
        $post->parent = ($request->input('parent') == '') ? 0 : $request->input('parent');
        $post->status = 'published';
        $post->type = 'post';
        $post->thumbnail = $request->thumbnail;
        $post->save();
        $tags = explode(',',$request->input('tags'));

        foreach($tags as $tag){
            $checkDB = \App\Tag::whereName($tag)->first();
            if($checkDB){
                $post->tags()->attach($checkDB->id);
            }else{
                $newTag = \App\Tag::create(['name' => str_slug($tag),'label' => $tag]);
                $post->tags()->attach($newTag->id);
            }
        }
        
        $post->categories()->attach($request->input('categories'));

        return redirect()->route('posts.index')->with('success','Post added successfully');
    }    

    public function edit(\App\Post $post)
    {
        //dd($post->thumbnail());
        $tagsArray = $post->tags->toArray();
        $categories = \App\Category::all();
        return view('posts.edit',compact(['post','categories']));
    }

    public function update(\App\Post $post,Request $request)
    {
        //dd($request->all());
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->excerpt = $request->input('excerpt');
        $post->thumbnail = $request->input('thumbnail');
        $post->save();

        $post->categories()->sync($request->input('categories'));

        $tags = explode(',',$request->input('tags'));

        $tagsArray = [];
        foreach($tags as $tag){
            $checkDB = \App\Tag::whereName($tag)->first();
            if($checkDB){                
                array_push($tagsArray,$checkDB->id);
            }else{
                $newTag = \App\Tag::create(['name' => str_slug($tag),'label' => $tag]);
                array_push($tagsArray,$newTag->id);                
            }
        }

        $post->tags()->sync($tagsArray);
        

        if($request->input('imagethumbnail') != 0){

            $thumbnail = \App\Post::find($request->input('imagethumbnail'));

            $thumbnail->parent = $post->id;
            $thumbnail->save();
        }
        return redirect()->route('posts.index')->with('success','Post has been edited successfully.');
    }

    public function delete($id)
    {
        $post = \App\Post::findOrFail($id);

        $thumbnail = \App\Post::whereParent($id)->first();

        if($thumbnail){
            $thumbnail->parent = 0;            
            $thumbnail->save();
        }

        $post->categories()->detach();

        $post->delete($id);
        return redirect()->route('posts.index')->with('success','Post has been deleted successfully.');
    }
}
