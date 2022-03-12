<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(),
            'filepath'=>$this->faker->sentence(),
            'body'=>$this->faker->paragraph(30),
            'user_id'=>User::factory(),

        ];
    }
}
