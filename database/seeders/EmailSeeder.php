<?php

namespace Database\Seeders;

use App\Models\Email;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 20 email records with varied states
        Email::factory()
            ->count(5)
            ->new()
            ->create();

        Email::factory()
            ->count(8)
            ->processed()
            ->create();

        Email::factory()
            ->count(4)
            ->archived()
            ->create();

        Email::factory()
            ->count(2)
            ->locked()
            ->create();

        Email::factory()
            ->count(1)
            ->withAttachments()
            ->locked()
            ->create();

        $this->command->info('Created 20 email records with varied states.');
    }
}
