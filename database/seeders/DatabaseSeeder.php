<?php

namespace Database\Seeders;

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
       $this->call([
        CategorySeeder::class,
       ]);

       \App\Models\Author::factory(7)->create();
       \App\Models\Book::factory(7)->create();

       $this->call([
        UserSeeder::class,
        CategorySeeder::class
       ]);
    }
}
