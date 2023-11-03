<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class AdsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'title' => $this->faker->sentence(8),
                'category' => $this->faker->word(),
                'description' => $this->faker->paragraphs(1, true),
                'price'=> $this->faker->randomDigit(),
                'location'=> $this->faker->postcode(),
                'photo' => $this->faker->imageUrl(360, 360)
        ];
    }
}
