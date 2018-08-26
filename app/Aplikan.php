<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplikan extends Model
{
    protected $table = 'aplikan';
    protected $dates = ['tanggal_daftar','tanggal_take'];
    protected $fillable = ['tanggal_daftar','nama','jenis_kelamin','tempat_lahir','tanggal_lahir','agama','email','telepon','alamat','village_id','asal_sekolah','jurusan_sekolah','konsentrasi_id','kelas_id','sumber_informasi','user_id','','aplikan_status_id','status_detail','tanggal_take','pilihan_kampus_id','token','pt_id',];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){
            foreach ($model->attributes as $key => $value) {
                $model->{$key} = empty($value) ? null : $value;
            }
        });

        static::updating(function($model){
            foreach ($model->attributes as $key => $value) {
                $model->{$key} = empty($value) ? null : $value;
            }
        });
    }

    public function status()
    {
    	return $this->belongsTo('App\AplikanStatus','aplikan_status_id','id');
    }

    public function pt()
    {
        return $this->belongsTo(\App\Pt::class);
    }  

    public function kelurahan()
    {
    	return $this->belongsTo(Kelurahan::class,'village_id','id');
    }

    public function pilihanKampus()
    {
        return $this->belongsTo(PilihanKampus::class);
    }

    public function alamatLengkap()
    {
    	$alamat = $this->alamat.' ';

        if($this->kelurahan){
    	   $alamat .= $this->kelurahan->name.', '.$this->kelurahan->kecamatan->name.', '.$this->kelurahan->kecamatan->kabupaten->name.', '.$this->kelurahan->kecamatan->kabupaten->provinsi->name;
    	   return $alamat;
        }

        return NULL;

    }
    public function takenBy()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function trackUser()
    {
         return $this->belongsToMany(User::class,'aplikan_track','aplikan_id','user_id')->withPivot('nama_proses')->withTimestamps();
    }

    public function presenter()
    {        
        return $this->belongsTo(User::class,'user_id');        
    }

    public function hasBeenTaken()
    {
        if($this->takenBy){
            return true;
        }
        return false;
    }

    public function followedUpBy()
    {
        return $this->belongsToMany(User::class,'followup','aplikan_id','user_id')->withPivot('keterangan')->withTimestamps();
    }

    public function dilayaniOleh()
    {
        return $this->belongsToMany(User::class,'melayani','aplikan_id','user_id')->withPivot('keterangan')->withTimestamps();
    }

    public function konsentrasi()
    {
        return $this->belongsTo(Konsentrasi::class);
    }

    public function jmlFollowedUp()
    {
        return $this->followedUpBy->count();
    }

    public function jmlDilayani()
    {
        return $this->dilayaniOleh->count();
    }
    public function isMine($userId)
    {
        if($this->user_id != $userId){
            return false;
        }
        return true;
    }

    public static function jmlPria()
    {
        $instance = new static;     
        if($ptId){
            return $instance->newQuery()->whereJenisKelamin('P')->wherePtId($ptId)->count();            
        }

        return $instance->newQuery()->whereJenisKelamin('P')->count(); 
    }

    public static function jmlWanita($ptId = NULL)
    {
        $instance = new static;     
        if($ptId){
            return $instance->newQuery()->whereJenisKelamin('W')->wherePtId($ptId)->count();
        }
        return $instance->newQuery()->whereJenisKelamin('W')->count();
    }

    public function hasBeenTakenBefore()
    {
        if(AplikanTrack::whereAplikanId($this->id)->count() > 0){
            return true;
        }
        return false;
    }

    public function isFresh()
    {
        $mulai = \Carbon\Carbon::parse(getOption('mulai_tahun_akademik'));
        $akhir = \Carbon\Carbon::parse(getOption('akhir_tahun_akademik'));

        return $this->tanggal_daftar->between($mulai,$akhir);
    }

    public function domisili()
    {
        return $this->belongsTo(Kelurahan::class,'village_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
