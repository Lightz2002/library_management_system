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
        Book::create([

            'title' => 'Learning AI',
            'slug' => 'learn_ai',
            'cover' => 'book-images/ai.jpg',
            'pages' => 812,
            'publish_year' => '2017',
            'author_id' => 2,
            'publisher_id' => 2
        ]);


        Book::create([
            'title' => 'Sistem Informasi Manajemen',
            'slug' => 'sistem_informasi',
            'cover' => 'book-images/si.jpg',
            'pages' => 412,
            'publish_year' => '2015',
            'author_id' => '1',
            'publisher_id' => 1

        ]);


        Book::create([

            'title' => 'Learn PHP & MySQL',
            'slug' => 'php_mysql',
            'cover' => 'book-images/php_mysql.jpg',
            'pages' => 642,
            'publish_year' => '2017',
            'author_id' => 3,
            'publisher_id' => 1,
        ]);
    }
}
