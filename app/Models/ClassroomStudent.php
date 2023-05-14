<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomStudent extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'classroom_students';

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
