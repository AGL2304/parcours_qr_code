<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Site;
use App\Models\Parcours;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */



    public function run(): void
    {
        // Crée des utilisateurs
        User::factory(5)->create();

        // Crée des sites
        $sites = Site::factory(20)->create();

        // Crée des parcours avec des sites associés
        Parcours::factory(10)->create()->each(function ($parcours) use ($sites) {
            $siteSelection = $sites->random(rand(3, 6));
            foreach ($siteSelection as $index => $site) {
                $parcours->sites()->attach($site->id, ['ordre' => $index + 1]);
            }
        });
    }
}

    

