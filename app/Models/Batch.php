<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    public function courseBatchs()
    {
        return $this->hasMany(CourseBatch::class);
    }
}
