<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Aplikan;
use App\Post;

class ApiController extends Controller
{
    public function aplikansaya()
    {
    	$aplikansaya = JWTAuth::parseToken()->authenticate()->aplikan;

    	return response()->json($aplikansaya);
    }

     public function aplikanterbaru()
    {
    	$aplikanterbaru = Aplikan::orderBy('tanggal_daftar','desc')->whereTanggalTake(null)->whereAplikanStatusId(2)->take(20)->with('konsentrasi')->get();
    	$aplikanterbaru->transform(function($aplikan,$key){
    		$aplikan->kapan_daftar = $aplikan->tanggal_daftar->diffForHumans();
    		$aplikan->jumlah_follow_up = $aplikan->jmlFollowedUp();
    		$aplikan->jumlah_dilayani = $aplikan->jmlDilayani();
    		$aplikan->sudah_pernah_ditake = $aplikan->hasBeenTakenBefore();
    		return $aplikan;
    	});

    	return response()->json($aplikanterbaru);
    }
    public function takeaplikan(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        if($user->hasReachLimitTakeAplikanPerDay()){
            return response()->json(['status' => 'failed','aplikan' => null]);            
        }
        $aplikan = Aplikan::find($request->idaplikan);        

        $aplikan->tanggal_take = \Carbon\Carbon::now();
        $aplikan->user_id = $user->id;
        $aplikan->save();

        \App\AplikanTrack::create([
                'aplikan_id' => $aplikan->id,
                'nama_proses' => 'taken',
                'user_id' => $user->id
            ]);

        return response()->json(['status' => 'success','aplikan' => $aplikan]);        
    }

    public function getPosts()
    {
        return $posts = Post::whereStatus('published')->whereType('post')->orderBy('created_at','desc')->get();
        return response()->json(['posts' => $posts],200);
    }
}
