<?php

use App\Models\Client;
use App\Models\Person;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class, 10)->create()->each(function (Client $client){
            $person = factory(Person::class)->make();
            $client = $person->personable()->associate($client);
            $client->save();
        });
    }
}
