<?php
use App\Models\Event;
use Faker\Generator as Faker;


$factory->define(Event::class, function (Faker $faker) {
    $date = \Carbon\Carbon::now();
    return [
        'client_id' => rand(1,10),
        'name' => $faker->name,
        'quantityEmployees' => rand (1,100),
        'observations' => $faker->text,
        'start_date' => $date->addDays(1),
        'end_date' => $date->addDays(2),
        'status' => 1
    ];
});
