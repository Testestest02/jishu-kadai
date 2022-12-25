<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' =>  $this->faker->randomElement(['1','11','21', '31','41','51']),
            'item_id' =>  $this->faker->randomElement(['1','11','21','31','41','51','61','71','81','91','101','111']),
            'name' => $this->faker->name(),
            'score' => $this->faker->randomElement(['♡ ♡ ♡ ♡ ♡','♥ ♡ ♡ ♡ ♡','♥ ♥ ♡ ♡ ♡', '♥ ♥ ♥ ♡ ♡','♥ ♥ ♥ ♥ ♡','♥ ♥ ♥ ♥ ♥']),
            'comment' => $this->faker->realText(200),
        ];
    }
}
