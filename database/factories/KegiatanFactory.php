<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'user_id' => 1,
            'nama' => $this->faker->sentence(),
            'deskripsi' => $this->faker->paragraph(),
            'waktu' => $this->faker->date,
            'slug' => $this->faker->slug,
            'tempat' => $this->faker->sentence(),
        ];
    }
}
