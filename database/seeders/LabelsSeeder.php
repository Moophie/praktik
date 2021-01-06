<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Seeder;

class LabelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add defined labels to the database

        $label = new Label();
        $label->name = "new";
        $label->description = "Default label for all incoming applications.";
        $label->save();

        $label = new Label();
        $label->name = "starred";
        $label->description = "Star applications to label them as favorites.";
        $label->save();

        $label = new Label();
        $label->name = "approved";
        $label->description = "Applications that have been approved.";
        $label->save();

        $label = new Label();
        $label->name = "declined";
        $label->description = "Applications that have been declined.";
        $label->save();
    }
}
