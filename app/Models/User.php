<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'photo',
        'phone',
        'dob',
        'gender'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Define the one-to-one relationship with the Teacher model
    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'user_id');
    }

    // One to Many
    public function recruits()
    {
        return $this->hasMany(Recruit::class);
    }

    public function courseBatchs()
    {
        return $this->hasMany(CourseBatch::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'classroom_student_id');
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_students');
    }

    // Define the one-to-one relationship with the Teacher model
    public function paymentConfirm()
    {
        return $this->hasOne(PaymentConfirm::class);
    }

    public function teacherLevels()
{
    return $this->hasMany(TeacherLevel::class);
}

}
