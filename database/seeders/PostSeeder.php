<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
                'slug'=>   Str::slug('eren '.Str::random()),
                'icerik' => 'deneme'.$i,
                'kullanici_id' => 1,
            ]);
        }
    }
}
