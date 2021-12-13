<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinSeeder extends Seeder
{
    public function run()
    {

        DB::table('coins')->insert([
            'name' => 'gc',
            'currency' => 'USD',
            'value' => null,
            'rate' => null,
        ]);

        DB::table('coins')->insert([
            'name' => 'gem',
            'currency' => 'USD',
            'value' => null,
            'rate' => null,
        ]);

        DB::table('coins')->insert([
            'name' => 'gsg',
            'currency' => 'USD',
            'value' => '700',
            'rate' => '70',
        ]);

    }
}
