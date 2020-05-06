<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'post_title' =>  'No other framework like Laravel!',
            'post_excerpt'  =>  'The best PHP framework',
            'post_body'  =>  'No other framework like Laravel!; The best PHP framework',
            'category'=>'Space',
            'creator'  =>  'Joshua',
        ]);
    }
}
