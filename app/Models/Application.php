<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    public function job()
    {
        return $this->belongsTo('\App\Models\Job');
    }

    use HasFactory;
}
