<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Create a default user
        User::create([
            'name' => 'Default User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
