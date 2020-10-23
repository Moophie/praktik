<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function company()
    {
        return $this->belongsTo('\App\Models\Company');
    }

    public function applications()
    {
        return $this->hasMany('\App\Models\Job');
    }

    use HasFactory;
}
