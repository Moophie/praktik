<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class StationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = Http::get("https://api.irail.be/stations/?format=json")->json();
        foreach ($stations['station'] as $s) {
            $station = new Station();
            $station->name = $s['name'];
            $station->latitude = $s['locationY'];
            $station->longitude = $s['locationX'];
            $station->save();
        }
    }
}
