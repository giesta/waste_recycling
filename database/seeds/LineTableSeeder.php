<?php

use Illuminate\Database\Seeder;

class LineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Line::class, 10)->create();
    }
}
