<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define the one-to-one relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //One(recruit) to Many(teacher)
    //One(recruit) can have many teachers
    public function recruit()
    {
        return $this->belongsTo(Recruit::class);
    }

    //Many to Many
    //A Teacher can teach many levels
    public function levels()
    {
        return $this->belongsToMany(Level::class, 'teacher_levels');
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

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
