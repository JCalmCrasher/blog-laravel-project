<?php

use Illuminate\Database\Seeder;

class PostCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\PostCategory::create([
            'category' => 'Space',
            'creator' => 'joshua',
        ]);
    }
}
