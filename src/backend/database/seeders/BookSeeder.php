<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
              ['title' => 'Book 1', 'unitCount' => 5, 'price' => '3', 'created_at' => now(), 'updated_at' => now()],
              ['title' => 'Book 2', 'unitCount' => 5, 'price' => '3', 'created_at' => now(), 'updated_at' => now()],
              ['title' => 'Book 3', 'unitCount' => 5, 'price' => '4', 'created_at' => now(), 'updated_at' => now()],
              ['title' => 'Book 4', 'unitCount' => 5, 'price' => '4', 'created_at' => now(), 'updated_at' => now()],
              ['title' => 'Book 5', 'unitCount' => 5, 'price' => '5', 'created_at' => now(), 'updated_at' => now()]
        ];

        Book::insert($books);
    }
}
