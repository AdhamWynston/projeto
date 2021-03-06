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
        $this->call(UsersTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
    }
}
