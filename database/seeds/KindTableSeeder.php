<?php

use Illuminate\Database\Seeder;
use App\Kind;

class KindTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Kind::class)->create([
            'name'=>'Metalas',
        ]);
        factory(Kind::class)->create([
            'name'=>'Plastikas',
        ]);
        factory(Kind::class)->create([
            'name'=>'Popierius',
        ]);
        factory(Kind::class)->create([
            'name'=>'Stiklas',
        ]);
    }
}
