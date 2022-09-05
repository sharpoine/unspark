<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 11; $i++) {
            DB::table('posts')->insert([
                'baslik' => 'eren'.$i,
                'icerik' => 'deneme'.$i,
                'kullanici_id' => 1,
            ]);
        }
    }
}
