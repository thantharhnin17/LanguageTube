<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    // One to One
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Many to Many
    //A Teacher can teach many levels
    public function teacher_levels()
    {
        return $this->belongsToMany(TeacherLevel::class,'teacher_levels','teacher_id','level_id');
    }
    // public function levels()
    // {
    //     return $this->belongsToMany(Level::class, 'teacher_level', 'teacher_id', 'level_id');
    // }

    //One to Many
    //Teacher can have many certificates
    public function teacher_certificates()
    {
        return $this->hasMany(TeacherCertificate::class);
    }
}
