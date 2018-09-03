<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class StaticPageController extends Controller
{
	public function index()
	{
		$pages = \App\Post::whereType('page')->orderBy('published_at','desc')->get();		
		return view('staticpages.index',compact(['pages']));
	}

	public function add()
    {       
    	return view('staticpages.add');
    }

    public function create(Request $request)
    {
        //dd($request->all());
        $post = new \App\Post;
        $post->user_id = \Auth::user()->id;
        $post->published_at = \Carbon\Carbon::now();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->excerpt = $request->input('excerpt');
        $post->parent = ($request->input('parent') == '') ? 0 : $request->input('parent');
        $post->thumbnail = $request->thumbnail;
        $post->status = 'published';
        $post->type = 'page';
        $post->save();        

        return redirect()->route('static.pages.index')->with('success','Page added successfully');
    }

    public function edit(Post $post)
    {
    	$page = $post;    
        return view('staticpages.edit',compact(['page']));
    }

    public function update(Request $request, Post $post)
    {    	
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->excerpt = $request->input('excerpt');
        $post->thumbnail = $request->thumbnail;
        $post->save();        
        
        return redirect()->back()->with('success','Post has been edited successfully.');
    }

    public function delete($id)
    {
        $post = \App\Post::findOrFail($id);

        $thumbnail = \App\Post::whereParent($id)->first();

        if($thumbnail){
            $thumbnail->parent = 0;            
            $thumbnail->save();
        }        

        $post->delete($id);
        return redirect()->route('static.pages.index')->with('success','Post has been deleted successfully.');
    }

    
}
