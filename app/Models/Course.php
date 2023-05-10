<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
