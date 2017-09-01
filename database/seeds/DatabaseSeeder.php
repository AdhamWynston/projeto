<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
Use App\Models\Post;
class DatabaseSeeder extends Seeder
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
