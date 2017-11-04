<?php

use App\Models\Employee;
use App\Models\State;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'document' => $faker->numerify('###########'),
        'street' => $faker->streetName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'status' => rand(0,1),
        'zip_code' => function() use($faker){
            $cep = preg_replace('/[^0-9]/','',$faker->postcode());
            return $cep;
        },
        'number' => rand(1,100),
        'complement' => $faker->streetName,
        'city' => $faker->city,
        'neighborhood' => $faker->city,
        'state' => collect(State::$states)->random(),
    ];
});