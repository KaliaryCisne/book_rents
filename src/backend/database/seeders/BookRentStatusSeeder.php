<?php

namespace Database\Seeders;

use App\Models\BookRentStatus;
use Illuminate\Database\Seeder;

class BookRentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['status' => 'ongoing'],
            ['status' => 'paid'],
            ['status' => 'late'],
        ];
        BookRentStatus::insert($status);
    }
}
