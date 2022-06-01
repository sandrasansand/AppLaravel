<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; //clase para el slug
use App\Models\User;
use App\Models\Category;
use App\Models\Price;
use App\Models\Level;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->sentence();
        return [
            // generamos datos falsos
            'title'=>  $title,
            'subtitle'=> $this->faker->sentence(),
            'description'=> $this->faker->paragraph(),
            'status'=> $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO]),
            'slug'=> Str::slug($title),
            //'user_id'=> $this->faker->randomElement([1,2,3,4]),
            'user_id' => User::all()->random()->id,
            'level_id'=> Level::all()->random()->id,
            'category_id'=> Category::all()->random()->id,
            'price_id'=> Price::all()->random()->id,

        ];
    }
}
