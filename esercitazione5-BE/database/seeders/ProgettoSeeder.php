<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Progetto;
use App\Models\User;
use Faker\Factory as Faker;

class ProgettoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Preleva tutti gli ID degli utenti
        $userIds = User::all()->pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            Progetto::create([
                'name' => $faker->sentence,
                'descrizione' => $faker->paragraph,
                'data_inizio' => $faker->date,
                'data_fine' => $faker->date,
                'user_id' => $faker->randomElement($userIds),
            ]);
        }
    }
}
