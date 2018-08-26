<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email','username','password','activated','role_id','first_name','last_name','photo'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('\App\Role');
    }

    public function aplikan()
    {
        return $this->hasMany(Aplikan::class);
    }

    public function followup()
    {
        return $this->belongsToMany(Aplikan::class,'followup','user_id','aplikan_id')->withPivot('keterangan')->withTimestamps();
    }

    public function melayani()
    {
        return $this->belongsToMany(Aplikan::class,'melayani','user_id','aplikan_id')->withPivot('keterangan')->withTimestamps();   
    }

    public function register()
    {
        return $this->aplikan()->whereAplikanStatusId(4);
    }

    public function trackAplikan()
    {
        return $this->belongsToMany(Aplikan::class,'aplikan_track','user_id','aplikan_id')->withPivot('nama_proses')->withTimestamps();
    }

    public function pt()
    {
        return $this->belongsTo(\App\Pt::class);
    }

    public function getNameOrEmail($fullname = false)
    {
        if($this->first_name){
            if($fullname == true){
                return $this->first_name.' '.$this->last_name;
            }else {
                return $this->first_name;
            }
        }

        return $this->email;
    }

    public function canAccess($routeName)
    {
        $role = \Auth::user()->role;
        $permissions = [];
        foreach($role->permissions as $perm){
            array_push($permissions,$perm->name_permission);
        }
        // if (\Auth::user()->role->name == 'Superadmin') {
        //     return true;
        // }

        if(!in_array($routeName,$permissions) AND \Auth::user()->role->name !== 'Superadmin'){
            return false;
        }

        return true;
    }   

    public function isAdmin()
    {
        if(in_array($this->role->id,[2,5])){
            return true;
        }

        return false;
    }

    public function isSuperAdmin()
    {
        if($this->role->id == 2){
            return true;
        }

        return false;   
    }

    public function isPresenter()
    {
        if($this->role->id == 3){
            return true;
        }
        return false;
    }

    public function isReferrer()
    {
        if($this->role->id == 7){
            return true;
        }
        return false;   
    }
    public function isKeuangan()
    {
        if($this->role->id == 4){
            return true;
        }
        return false;
    }

    public function isAdminKampus()
    {
        if($this->role->id == 5){
            return true;
        }
        return false;
    }

    public function getAvatarUrl()
    {
        if($this->photo){
            return url('/').$this->photo;
        }

        return url('assets/backend/img').'/default.jpg';
    }

    public function amountOfTakingAplikanToday()
    {
        return $this->aplikan()->whereDay('tanggal_take',\Carbon\Carbon::now()->day)->count();
    }

    public function hasReachLimitTakeAplikanPerDay()
    {
        if(getOption('limit_take_aplikan_per_day') <= $this->amountOfTakingAplikanToday()){
            return true;
        }

        return false;
    }

    function stars(){
        $gold = 0;
        $star = 6;

        $followup_ideal = 4; // 4 Kali followup

        $html = '';
        // if(!$this->aplikan->isEmpty()){
        //     $gold += 1;
        // }

        // aplikan yang daftar oleh presenter dibagi dengan seluruh aplikan daftar (persentase)
        // daftar mendapat porsi 2 bintang, maka persentase di atas dibagi 2 lalu di lakukan pembulatan
        $daftar = ceil(($this->aplikan()->whereAplikanStatusId(3)->count() / Aplikan::whereAplikanStatusId(3)->count())*2);

        $gold += $daftar;

        // aplikan yang regis oleh presenter dibagi dengan seluruh aplikan regis (persentase)
        // regis mendapat porsi 3 bintang, maka persentase di atas dibagi 2 lalu di lakukan pembulatan
        $regis = ceil(($this->aplikan()->whereAplikanStatusId(4)->count() / Aplikan::whereAplikanStatusId(4)->count())*3);

        $gold += $regis;
        
        for($i=1;$i<=$star;$i++){
            if($gold >= $i){
                $html .='<span class="fa fa-star" style="color:#fdc321;"></span>';                
            } else {
                $html .='<span class="fa fa-star"></span>';                
            }
        }

        $html .= ' <i class="fa fa-info-circle" style="color:#ddd;" data-toggle="popover" data-trigger="hover" title="Sistem rating" data-content="Data dihitung berdasarkan jumlah aplikan, status aplikan, kegiatan presenter seperti melayani, memfollowup mendaftarkan dan meregistrasikan aplikan."></i>';
        return $html;
    }

}
