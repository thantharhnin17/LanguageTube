<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCertificate extends Model
{
    use HasFactory;
    protected $guarded = [];

    //One to Many
    //Teacher can have many certificates
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
