<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Line;
use App\Invoice;
use App\Stock;
use Faker\Generator as Faker;

$factory->define(Line::class, function (Faker $faker) {
    return [
        'amount' => $faker->randomDigitNot(0),
        'invoice_id' => function(){
            return factory(Invoice::class)->create()->id;
        },
        'stock_id' => function(){
            return factory(Stock::class)->create()->id;
        },
    ];
});
