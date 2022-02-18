<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Book
{
    private static $books = [
        [
            'title' => 'Sistem Informasi',
            'slug' => 'sistem_informasi',
            'pages' => '20',
            'publish_year' => '2021',
            'isbn' => '123456',
            'author' => 'Jesslia',
            'cover' => 'si.jpg'
        ],
        [
            'title' => 'Learn PHP MYSQL',
            'slug' => 'learn_php_mysql',
            'pages' => '20',
            'publish_year' => '2021',
            'isbn' => '123456',
            'author' => 'Jesslia',
            'cover' => 'php_mysql.jpg'
        ],
        [
            'title' => 'Learning AI',
            'slug' => 'learn_ai',
            'pages' => '20',
            'publish_year' => '2021',
            'isbn' => '123456',
            'author' => 'Calum Chace',
            'cover' => 'ai.jpg'
        ]
    ];

    public static function all()
    {
        return collect(self::$books);
    }

    public static function find(string $slug)
    {
        $books = static::all();


        return $books->firstWhere('slug', $slug);
    }

    // use HasFactory;
}
