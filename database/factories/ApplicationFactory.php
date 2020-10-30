<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'user_id' => $this->faker->numberBetween($min= 1, $max = 4),
            'message' => $this->faker->realText(200),
            'label_id' => $this->faker->numberBetween($min = 1, $max = 4)
        ];
    }
}
