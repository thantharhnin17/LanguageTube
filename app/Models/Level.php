<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'language_id'];
    protected $guarded = [];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    //A level can have many teachers
    public function teachers()
    {
        return $this->hasMany(Teacher::class,'teachers_levels','teacher_id','level_id');
    }


    // protected $fillable = ['name'];

    // protected $casts = [
    //     'name' => 'array',
    // ];
}
