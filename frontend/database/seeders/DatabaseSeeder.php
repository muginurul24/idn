<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Payment;
use App\Models\Seo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Payment::factory(19)->create();
        Bank::factory(100)->create();
        // $this->call([
        //     ProviderSeeder::class,
        //     GameSeeder::class
        // ]);
        Seo::factory()->create();
    }
}
