<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class KhotbahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $judul = $this->faker->sentence(4); // contoh: "Kasih Tuhan yang Kekal"

        return [
            'user_id' => 1,
            'judul' => $judul,
            'pengkhotbah' => $this->faker->name(), // contoh: "Pdt. Markus"
            'tanggal' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'deskripsi' => $this->faker->paragraph(3), // contoh deskripsi pendek
            'youtube_url' => 'https://www.youtube.com/watch?v=' . Str::random(11), // fungsi tambahan di bawah
            'slug' => Str::slug($judul) . '-' . Str::random(4),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
