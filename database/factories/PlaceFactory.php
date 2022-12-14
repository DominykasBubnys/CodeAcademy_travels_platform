<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->title(),
            'description'=>$this->faker->text(),
            'image'=>$this->faker->url(),
            'address'=>$this->faker->address(),
            'likes'=>$this->faker->numberBetween(0,20),
            'author_id'=>$this->faker->text()
        ];
    }
}
