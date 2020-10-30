<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function company()
    {
        // Define the relationship to companies (many-to-one)
        return $this->belongsTo('\App\Models\Company');
    }

    public function applications()
    {
        // Define the relationship to applications (many-to-one)
        return $this->hasMany('\App\Models\Application');
    }

    use HasFactory;
}
