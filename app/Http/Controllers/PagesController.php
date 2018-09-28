<?php

namespace App\Http\Controllers;

use App\Aplikan;
use App\Category;
use App\Course;
use App\Events\FormDownloadBrosurEvent;
use App\Item;
use App\Level;
use App\Mail\OrderCheckedOut;
use App\Mail\StudentRegistration;
use App\Order;
use App\Post;
use App\Testimonial;
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
    	$testimonials = Testimonial::inRandomOrder()->take(2)->get();
    	return view('pages.singlecourse',compact(['course','testimonials']));
    }

    public function testimonials()
    {
    	$testimonials = Testimonial::paginate(20);
    	return view('pages.testimonials',compact(['testimonials']));
    }

    public function basket()
    {
    	// session()->forget('cart');
    	//dd(session('cart'));
    	return view('pages.basket');
    }

    public function checkout()
    {
    	return view('pages.checkout');
    }

    public function postcheckout(Request $request)
    {
    	//dd(session('cart'));
    	$request->request->add(['username' => 'test']);
    	$request->request->add(['role_id' => 3]);
    	$request->request->add(['activated' => 1]);
    	$request->merge(['password' => bcrypt($request->password)]);
    	$request->merge(['username' => createUsername($request->first_name)]);

    	//dd($request->all());
    	$user = \App\User::create($request->all());
    	$order = Order::create([
    		'user_id' => $user->id,
    		'total_qty' => session('cart')->totalQty,
    		'total_price' => session('cart')->totalPrice,
    		'status' => 'created',
    		'validated' => 0

    	]);
    	foreach(session('cart')->items as $key => $item){
    		Item::create([
    			'course_id' => $key,
    			'order_id' => $order->id,
    			'qty' => $item['qty'],
    			'price' => $item['price'],
    			'payment_scheme' => $item['payment_scheme']
    		]);
    	}
        \Mail::to($user->email)->send(new StudentRegistration($user));
        \Mail::to($user->email)->send(new OrderCheckedOut($user,$order));
    	auth()->loginUsingId($user->id);
    	return redirect()->route('page.index');
    }

    public function login()
    {
        if(auth()->check()){
            return redirect()->route('page.studentarea');
        }
        return view('pages.login');
    }

    public function studentarea()
    {
        return view('pages.studentarea');
    }

    public function courses()
    {
        $levels = Level::all();        
        return view('pages.courses',compact(['levels']));
    }
}
