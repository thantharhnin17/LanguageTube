<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    //One(recruit) to Many(teacher)
    //One(recruit) can have many teachers
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
