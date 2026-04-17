<?php

namespace Database\Seeders;

use App\Models\Seo;
use App\Models\Bank;
use App\Models\User;
use App\Models\Event;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Carousel;
use App\Models\Point;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Payment::factory(19)->create();
        Bank::factory(5)->create();
        for ($i = 1; $i <= 5; $i++) {
            Point::create([
                'user_id' => $i,
                'level' => 'vip',
                'point' => 0
            ]);
        }
        Seo::factory()->create();
        Contact::factory()->create();
        for ($i = 1; $i <= 7; $i++) {
            Carousel::create([
                'sequence' => fake()->randomElement([1, 2, 3, 4, 5, 6]),
                'image' => 'carousels/' . $i . '.webp',
                'alt' => 'Title Carousel ' . $i,
            ]);

            $titleEvent = fake()->sentence(2);

            Event::create([
                'label' => fake()->randomElement(['all', 'new', 'limited']),
                'title' => $titleEvent,
                'slug' => Str::slug($titleEvent),
                'banner' => 'events/' . $i . '-' . $i . '.webp',
                'description' => 'nanti aja di isinya sama asep',
            ]);
        }
    }
}
