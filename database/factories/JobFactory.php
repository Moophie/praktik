<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle(),
            'description' => $this->faker->realText(200),
            'start_date' => $this->faker->date($format = 'Y-m-d', $min = 'now'),
            'company_id' => $this->faker->numberBetween($min = 1, $max = 5)
        ];
    }
}
