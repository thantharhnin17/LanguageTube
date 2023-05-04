<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineLink extends Model
{
    use HasFactory;

    public function courseBatch()
    {
        return $this->belongsTo(CourseBatch::class);
    }
}
