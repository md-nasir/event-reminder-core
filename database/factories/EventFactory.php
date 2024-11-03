<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => 'EAV-'.$this->faker->unique()->regexify('[A-Z0-9]{8}'),
            'title' => 'Event '.$this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'start_date' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'end_date' => $this->faker->date(),
            'end_time' => $this->faker->time(),
            'time_zone' => 'Asia/Dhaka',
            'location' => 'Dhaka Gulshan, R#1, H#3',
            'status' => $this->faker->randomElement(\App\Enums\EventStatus::options()),
            'created_by_id' => \App\Models\User::factory(),
            'updated_by_id' => \App\Models\User::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
