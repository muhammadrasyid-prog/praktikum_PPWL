<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // hindari duplikasi data
        Post::truncate();

        for ($i = 1; $i <= 10; $i++) {
            Post::create([
                'title' => "Judul Postingan ke-$i",
                'description' => "Isi konten untuk postingan ke-$i.",
                'status' => $i % 2 ? 'published' : 'draft',
            ]);
        }
    }
}
