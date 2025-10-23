<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kegiatan;
use App\Models\Renungan;
use App\Models\Khotbah;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
         Kegiatan::factory(5)->create();
         Renungan::factory(5)->create();
         Khotbah::factory(5)->create();
    }
}
