<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Company::factory(5)->create();

        /* $company = new \App\Models\Company();
        $company->name = "Google";
        $company->location = "Los Angeles";
        $company->description = "Search engine";
        $company->email = "google@gmail.com";
        $company->rating = 0;
        $company->save();
        $company = new \App\Models\Company();
        $company->name = "Microsoft";
        $company->location = "Washington";
        $company->description = "Computer bedrijf";
        $company->email = "microsoft@outlook.com";
        $company->rating = 0;
        $company->save();
        $company = new \App\Models\Company();
        $company->name = "Apple";
        $company->location = "California";
        $company->description = "Bedrijf van iPhone";
        $company->email = "apple@imail.com";
        $company->rating = 0;
        $company->save();
        $company = new \App\Models\Company();
        $company->name = "Alternate";
        $company->location = "Antwerpen";
        $company->description = "Verkoper van computers";
        $company->email = "alternate@hotmail.com";
        $company->rating = 0;
        $company->save();
        $company = new \App\Models\Company();
        $company->name = "Intracto";
        $company->location = "Tilburg";
        $company->description = "Digital agency";
        $company->email = "intracto@gmail.com";
        $company->rating = 0;
        $company->save(); */
    }
}
