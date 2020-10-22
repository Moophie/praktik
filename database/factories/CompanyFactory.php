<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'city' => $this->faker->city(),
            'address' => $this->faker->streetAddress(),
            'geolat' => $this->faker->numberBetween($min = -90, $max = 90),
            'geolng' => $this->faker->numberBetween($min = -180, $max = 180),
            'logo' => "https://picsum.photos/200",
            'website' => $this->faker->url(),
            'description' => $this->faker->realText(200),
            'email' => $this->faker->companyEmail(),
            'phone' => $this->faker->phoneNumber(),
            'rating' => $this->faker->randomfloat($nbMaxDecimals = 2, $min = 1, $max = 5),
        ];
    }
}
