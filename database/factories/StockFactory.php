<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stock;
use App\Kind;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement([
            'Butelis',
            'Puodas',
            'Vaza',
            'Stiklinė',
            'Kėdė',
            'Grąžtas',
            'Vinis',
            'Puodukas',
            'Radiatorius',
            'Stalas',
            ]),
        'price' => $faker->randomFloat(2, 1, 100),
        'kind_id' => $faker->numberBetween(1,4),
    ];
});
