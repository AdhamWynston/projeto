<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Factory;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Post::truncate();
        foreach (range(1,100) as $i){
            Post::create([
                'title'=> $faker->title,
                'body'=> $faker->text
            ]);
        }
    }
}
