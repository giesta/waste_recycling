<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Kind;
use Faker\Generator as Faker;


$factory->define(Kind::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement([
            'Metalas',
            'Plastikas',
            'Stiklas',
            'Popierius',
            ]),
    ];
});