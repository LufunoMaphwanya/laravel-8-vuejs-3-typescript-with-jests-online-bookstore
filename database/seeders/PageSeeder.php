<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Author;
use App\Models\Book;


class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Book::all() as $book) {

            for ($p=0; $p <= rand(50,200); $p++){
                DB::table('pages')->insert([
                    'content' => Str::random(1000),
                    'book_id' => $book->id,
                ]);
            }
        }

    }
}
