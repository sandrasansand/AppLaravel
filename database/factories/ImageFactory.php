<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url'=> 'courses/'. $this->faker->image('public/storage/courses', 640 , 480, null, false), // storage\app\cursos
          
        ];
    }
}
