<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Course;
use App\Price;
class CartController extends Controller
{
    public function addtocart(Request $request){	
    	//$product = \DB::table('products')->select('*')->whereId($request->product_id)->first();	
		$price = Price::find($request->input('price_id'));
		//dd($request->all());
		$oldCart = (\Session::has('cart')) ? \Session::get('cart') : null;	
		$cart = new Cart($oldCart);
		$cart->add($price->course,$price,$price->course->id);
		session(['cart'=>$cart]);
		//$products = Product::all();
		//$viewlistbarang = view('ajax.list-barang',compact('products'))->render();
		//$viewlistpenjualan = view('ajax.list-penjualan')->render();
		return response()->json(['cart' => session('cart')]);
	}

	public function substractqty(Request $request)
	{
		$product = \App\Product::find($request->input('product_id'));
		$oldCart = (\Session::has('cart')) ? \Session::get('cart') : null;	
		$cart = new Cart($oldCart);
		$cart->substractqty($product,$product->id);
		session(['cart'=>$cart]);
		return response()->json(['cart' => session('cart')]);	
	}
	public function removefromcart(Request $request)
	{
		$oldCart = (\Session::has('cart')) ? \Session::get('cart') : null;

		$cart = new Cart($oldCart);
		$cart->removeItem($request->input('item_id'));
		session(['cart'=>$cart]);
		return response()->json(['cart' => session('cart')]);
	}

	public function getcartsession()
	{
		return response()->json(session('cart'));
	}

	public function ajaxqtyedit(Request $request)
	{			
		$cart = new Cart(\Session::get('cart'));
		// Cek stok barang, apakah tersedia untuk qty yang dinginkan
		$product = Product::find($request->pk);
		$alert = false;
		if($request->value > $product->available_stocks){
			$alert = true;
		} else {
			$cart->editQty($request->pk,$request->value);			

		}
		session(['cart' => $cart]);		
		$viewlistpenjualan = view('ajax.list-penjualan',compact(['alert']))->render();
		return response()->json(['cart' => session('cart'),'viewlistpenjualan' => $viewlistpenjualan]);
	}

	public function ajaxhargaedit(Request $request)
	{		
		//dd($request->all());	
		$cart = new Cart(\Session::get('cart'));
		// Cek stok barang, apakah tersedia untuk qty yang dinginkan
		$product = Product::find($request->pk);
		$alert_harga = false;
		if($request->value < $product->sell_price){
			$alert_harga = true;
		} else {
			$cart->editHarga($request->pk,$request->value);			

		}
		session(['cart' => $cart]);		
		$viewlistpenjualan = view('ajax.list-penjualan',compact(['alert_harga']))->render();
		return response()->json(['cart' => session('cart'),'viewlistpenjualan' => $viewlistpenjualan]);
	}

	public function ajaxremoveitem(Request $request)
	{
		//return response()->json($request->all());
		$cart = new Cart(\Session::get('cart'));
		$cart->removeItem($request->product_id);
		session(['cart' => $cart]);
		$products = Product::all();
		$viewlistbarang = view('ajax.list-barang',compact('products'))->render();
		$viewlistpenjualan = view('ajax.list-penjualan')->render();
		return response()->json(['cart' => session('cart'),'viewlistpenjualan' => $viewlistpenjualan,'viewlistbarang' => $viewlistbarang]);
	}

	public function ajaxaddcustomertocart(Request $request)
	{
		$oldCart = (\Session::has('cart')) ? \Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->changeCustomer($request->customer);
		session(['cart'=>$cart]);
		dd(session('cart'));
	}

	
}
