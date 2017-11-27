<?php

use App\Models\User;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'confirmed_at' => Carbon::now()->format('Y-m-d H:m:s'),
            'confirmed_token' => '14f7cefe-6e0f-3acf-949f-99e8ed3fa3b8',
            'role' => 1
        ]);
        factory(User::class)->create([
            'name' => 'Coordenador',
            'email' => 'coord@coord.com',
            'password' => bcrypt('123456'),
            'confirmed_at' => Carbon::now()->format('Y-m-d H:m:s'),
            'confirmed_token' => '14f7cefe-7e0f-3acf-949f-99e8ed3fa3b8',
            'role' => 1
        ]);
        factory(User::class, 10)->create();
    }
}
