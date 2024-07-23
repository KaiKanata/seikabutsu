<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' =>'GUCCI24SS',
            'body' =>'かっこいい',
            'image_path' =>'path/to/default_image.jpg',
            'created_at' =>new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}
