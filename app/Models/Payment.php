<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function classroom()
    // {
    //     return $this->belongsTo(Classroom::class);
    // }

    public function classroomStudent()
    {
        return $this->belongsTo(ClassroomStudent::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function paymentConfirm()
    {
        return $this->hasOne(PaymentConfirm::class);
    }

}
