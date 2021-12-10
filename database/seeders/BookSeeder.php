<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 200; $x++) {
            DB::table('books')->insert([
                'year' => rand(1995,2010),
                'title' => "Book title {$x}"
            ]);
        }
    }
}
