<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    public function applications()
    {
        // Define the relationship to applications (many-to-one)
        return $this->hasMany('\App\Models\Application');
    }
}
