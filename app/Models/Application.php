<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function job()
    {
        // Define the relationship to jobs (many-to-one)
        return $this->belongsTo('\App\Models\Job');
    }

    public function label()
    {
        // Define the relationship to jobs (many-to-one)
        return $this->belongsTo('\App\Models\Label');
    }

    public function user()
    {
        // Define the relationship to companies (many-to-one)
        return $this->belongsTo('\App\Models\User');
    }

    use HasFactory;
}
