<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Author::create([
            'slug' => 'ryan_kenidy',
            'firstname' => 'Ryan',
            'lastname' => 'Kenidy',
            'image' => ''
        ]);


        Author::create([
            'slug' => 'lia_natasya',
            'firstname' => 'Lia',
            'lastname' => 'Natasya',
            'image' => ''

        ]);



        Author::create([
            'slug' => 'jesselia',
            'firstname' => 'jesselia',
            'lastname' => '',
            'image' => ''

        ]);
    }
}
