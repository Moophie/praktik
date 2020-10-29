<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    public function jobs()
    {
        // Define the relationship to jobs (one-to-many)
        return $this->hasMany('\App\Models\Job');
    }

    // Calculate the public transport score
    function calcPubTransScore($lat, $lng)
    {
        // Query the database and get the closest station from the list
        // The results are ordered by distance in kilometers
        $nearest_station = DB::select("SELECT name, SQRT(POW(111.2 * (latitude - $lat), 2) + POW(111.2 * ($lng - longitude) * COS(latitude / 57.3), 2)) 
        AS distance FROM stations ORDER BY distance LIMIT 1");

        // Initialize the public transport score, set it to 0
        $pubtrans_score = 0;

        // If the nearest station is closer than 2 kilometers, add 1 to the public transport score
        // TODO: Add extra parameters en if statements for nearby busses, main roads, etc...
        if ($nearest_station[0]->distance < 2) {
            $pubtrans_score += 1;
        }

        return $pubtrans_score;
    }

    use HasFactory;
}
