<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RenunganFactory extends Factory
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
            'judul' => $this->faker->sentence(),
            'ayat' => $this->faker->sentence(),
            'isi' => $this->faker->paragraph(),
            'tanggal' => $this->faker->date,
            'slug' => $this->faker->slug,
        ];
    }
}
