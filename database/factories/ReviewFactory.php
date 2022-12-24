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
            'user_id' =>  rand(1, 6),
            'item_id' =>  rand(1, 6),
            'name' => $this->faker->name(),
            'score' => '♥ ♥ ♥ ♡ ♡',
            'comment' => $this->faker->realText(20),
        ];
    }
}
