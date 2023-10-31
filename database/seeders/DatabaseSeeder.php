<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
        Tag::factory(10)->create();

        $this->call([
            CampusSeedeer::class,
            PositionSeeder::class,
            OfficeSeeder::class,
        ]);

        $user = User::factory()->create([
            'email' => 'admin@example.com',
        ]);
        User::factory(1)->create();
    }
}
