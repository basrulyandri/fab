<?php

namespace App\Http\Controllers;

use App\Aplikan;
use App\Category;
use App\Level;
use App\Course;
use App\Events\FormDownloadBrosurEvent;
use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function index(Request $request)
	{
		//dd(\Menu::getByName('Under Logo'));
		if($request->has('psr')){
			\Cookie::queue('psr', $request->psr, time() + (86400 * 30));		
		}
		$latestPosts = Post::whereStatus('published')->whereType('post')->orderBy('published_at','desc')->take(10)->get();		
		return view('pages.index2',compact('latestPosts'));
	}

	public function downloadbrosur(Request $request)
	{		
		if($request->has('psr')){
			\Cookie::queue('psr', $request->psr, time() + (86400 * 30));		
		}

		return view('pages.downloadbrosur');	
	}

	public function postdownloadbrosur(Request $request)
	{		
		$this->validate($request,[
				'nama' => 'required',
				'email' => 'email|required',
				'telepon' => 'required|regex:/(08)[0-9]/'
			]);
		$aplikan  = Aplikan::whereEmail($request->email)->first();
		if($aplikan){
			return view('pages.successdownloadbrosur',compact(['aplikan']));
		}
		$request->merge(['tanggal_daftar' => \Carbon\Carbon::now(),'aplikan_status_id' =>2,'konsentrasi_id' => 2]);

		if($request->has('user_id')){
			$request->merge(['tanggal_take' => \Carbon\Carbon::now()]);			
		}
		
		$aplikan = Aplikan::create($request->except(['_token']));
		event(new FormDownloadBrosurEvent($aplikan));
		return view('pages.successdownloadbrosur',compact(['aplikan']));
	}

	public function single($slug)
	{
		$post = Post::whereSlug($slug)->first();
		if(!$post){
			return view('errors.404');
		}
		return view('pages.single',compact(['post']));
	}

	public function category($slug)
	{
		$category = Category::whereSlug($slug)->first();
		$posts = $category->posts()->paginate(10);
		return view('pages.category',compact('category','posts'));
	}

	public function register()
    {
        return view('pages.register');
    }

    public function singlelevel($slug)
    {
    	$level = Level::whereSlug($slug)->first();    	
    	return view('pages.singlelevel',compact(['level']));
    }

    public function singlecourse($slug)
    {
    	$course = Course::whereSlug($slug)->first();
    	return view('pages.singlecourse',compact(['course']));
    }
}
