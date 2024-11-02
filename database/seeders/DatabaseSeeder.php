<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create(['type' => 'web']);
        Event::factory(30)->create();
    }
}
