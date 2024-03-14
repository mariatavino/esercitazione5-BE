<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attività;
use Faker\Factory as Faker;
use App\Models\progetto;
class AttivitàSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Prendi tutti i progetti
        $progetti = progetto::all();

        foreach($progetti as $progetto) {
            // Crea 5 attività per ogni progetto
            foreach(range(1, 5) as $index) {
                Attività::create([
                    'name' => $faker->sentence,
                    'descrizione' => $faker->paragraph,
                    'stato' => $faker->randomElement(['In sospeso', 'In corso', 'Completato']),
                    'data_scadenza' => $faker->date,
                    'progetto_id' => $progetto->id, // Assegna l'ID del progetto corrente
                ]);
            }
        }
    }
}
