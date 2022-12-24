<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
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
            'name' => $this->faker->name(),
            'status' => 'active',
            'type' => $this->faker->randomElement(['アウター','インナー']),
            'sex' => $this->faker->randomElement(['男女兼用','男性用','女性用']),
            'max' => $this->faker->randomElement(['おしっこ1回分','おしっこ2回分','おしっこ3回分','おしっこ4回分','おしっこ5回分']),
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            }
        ];
    }
}
