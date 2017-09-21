<?php

use App\Models\User;
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
            'email' => 'admin@admin.com',
            'enrolment' => 100000,
            'password' => bcrypt('123456')
        ])->each(function (User $user){
            if($user->userable()) {
                User::assingRole($user, User::ROLE_ADMIN);
                $user->save();
            }
        });
        factory(User::class, 10)->create()->each(function (User $user){
            if($user->userable()) {
                User::assingRole($user, User::ROLE_COORDINATOR);
                User::assignEnrolment($user, User::ROLE_COORDINATOR);
                $user->save();
            }
        });
    }
}
