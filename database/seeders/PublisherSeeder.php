<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Publisher::create([
            'id' => 1,
            'name' => 'Republika',
            'phone' => '+6282313375102',
            'address' => 'Jalan Ir.soekarno No.11, Jakarta'
        ]);

        Publisher::create([
            'id' => 2,
            'name' => 'Gramedia Teknologi',
            'phone' => '+6289551223411',
            'address' => 'Jalan Bima Sakti No.9, Bandung'
        ]);

        Publisher::create([
            'id' => 3,
            'name' => 'Erlangga',
            'phone' => '+6281212424364',
            'address' => 'Jalan Moh.Hatta No.15, Surabaya'
        ]);
    }
}
