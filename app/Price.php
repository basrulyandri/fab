<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['course_id','amount_idr','amount_usd','payment_scheme','student_type','notes'];

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }
    public function studentType()
    {
        return ucfirst($this->student_type);
    }

    public function paymentScheme()
    {        
        return ucfirst(str_replace('_',' ',$this->payment_scheme));
    }

    // public function getStudentTypeAttribute($value)
    // {
    // 	return ucfirst($value);
    // }

    // public function getPaymentSchemeAttribute($value)
    // {
    // 	$str = str_replace('_',' ',$value);
    // 	return ucfirst($str);
    // }
}
