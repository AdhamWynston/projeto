<?php

use App\Models\User;
use App\Models\Profile;
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
            'role' => 1
        ]);
        factory(User::class)->create([
            'name' => 'Coordenador',
            'email' => 'coord@coord.com',
            'password' => bcrypt('123456'),
            'role' => 1
        ]);
        factory(User::class, 10)->create();
    }
}
