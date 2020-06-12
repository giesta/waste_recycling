<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Invoice;
use App\User;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'client_name' => $faker->company,
        'client_address' => $faker->address,
        'client_number' => $faker->e164PhoneNumber,
        'client_code' => $faker->randomNumber,
        'date' => $faker->date('Y-m-d', 'now'),
        'total_sum' => $faker->randomFloat(2, 1, 1000),
        'user_id' => function(){
            return factory(User::class)->create()->id;
        },
    ];
});
