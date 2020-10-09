<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'content' => $this->faker->realText(200),
            'rating' => $this->faker->numberBetween($min = 1, $max = 5),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 4),
            'company_id' => $this->faker->numberBetween($min = 1, $max = 5),
        ];
    }
}
