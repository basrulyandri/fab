<?php

function getOption($key,$serialize = false){
	$option = \App\Option::whereOptionKey($key)->first();
	if(!$option){
		return null;
	}
	if($serialize){
		return unserialize($option->option_value);
	}

	return $option->option_value;
}

function getPtOption($key,$unserialize = false){
	$option = \App\PtOption::whereOptionKey($key)->wherePtId(\Auth::user()->pt_id)->first();

	if($unserialize){
		return unserialize($option->option_value);
	}

	return $option->option_value;
}

function toRp($angka)
{
 	$jadi = "Rp. " . number_format($angka,0,',','.');
	return $jadi;
}

function jmlTagihan($status){
	return \App\Tagihan::whereStatus($status)->count();
}

function jmlAplikanSaya(){
	return \App\Aplikan::whereUserId(auth()->user()->id)->count();
}

function numberToColumn($number)
{
	if($number == 1){
		return 12;
	}elseif($number == 2){
		return 6;
	}elseif($number == 3){
		return 4;
	}else{
		return 3;
	}
}

function posts()
{
	return \App\Post::whereType('post')->whereStatus('published')->get();
}

function postsAndPages()
{
	return \App\Post::whereIn('type',['post','page'])->whereStatus('published')->orderBy('type')->get();
}

function sliders()
{	
	return \App\Post::whereIn('id',array_flatten(unserialize(getOption('theme_option_slider_contents'))))->get();
}

function latestPosts($take = 5){
	return \App\Post::whereStatus('published')->whereType('post')->orderBy('created_at','desc')->take($take)->get();
}

function listPresenters(){
	return \App\User::whereRoleId(3)->pluck('username','id');
}

function aplikanHistories($aplikan){	
	$followup = $aplikan->followedUpBy()->orderBy('followup.created_at','desc')->get();	
	$layani = $aplikan->dilayaniOleh()->orderBy('melayani.created_at','desc')->get();
	$layani->map(function($item,$key) use ($followup){
		$followup->push($item);
	});

	return $followup->sortByDesc('pivot.created_at');	
}

function userActivities($user){	
	$followup = $user->followup()->orderBy('followup.created_at','desc')->get();	
	$melayani = $user->melayani()->orderBy('melayani.created_at','desc')->get();
	$melayani->map(function($item,$key) use ($followup){
		$followup->push($item);
	});

	return $followup->sortByDesc('pivot.created_at');	
}

function hp($nohp) {
    // kadang ada penulisan no hp 0811 239 345
    $nohp = str_replace(" ","",$nohp);
    // kadang ada penulisan no hp (0274) 778787
    $nohp = str_replace("(","",$nohp);
    // kadang ada penulisan no hp (0274) 778787
    $nohp = str_replace(")","",$nohp);
    // kadang ada penulisan no hp 0811.239.345
    $nohp = str_replace(".","",$nohp);
    $hp = '';
    // cek apakah no hp mengandung karakter + dan 0-9
    if(!preg_match('/[^+0-9]/',trim($nohp))){
        // cek apakah no hp karakter 1-3 adalah +62
        if(substr(trim($nohp), 0, 3)=='+62'){
            $hp = trim($nohp);
        }
        // cek apakah no hp karakter 1 adalah 0
        elseif(substr(trim($nohp), 0, 1)=='0'){
            $hp = '62'.substr(trim($nohp), 1);
        }
    }
    return $hp;
}

function courses($orderBy = 'course_order')
{
	return \App\Course::orderBy($orderBy,'desc')->get();
}

function createUsername($firstname)
{
	   $username = strtolower($firstname);
       $userRows  = \App\User::whereRaw("username REGEXP '^{$username}(-[0-9]*)?$'")->get();
       $countUser = count($userRows) + 1;

       return ($countUser > 1) ? "{$username}{$countUser}" : $username;
}