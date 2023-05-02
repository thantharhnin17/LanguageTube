<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function recruits()
    {
        return $this->hasMany(Recruit::class);
    }
}
