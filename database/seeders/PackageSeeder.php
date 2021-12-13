<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $coin = DB::table('coins')->where('name', 'gc')->first();
        DB::table('packages')->insert([
            'package_name' => 'silver',
            'price' => '10',
            'value' => '100',
            'coin_id' => $coin->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('packages')->insert([
            'package_name' => 'platinum',
            'price' => '100',
            'value' => '1000',
            'coin_id' => $coin->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('packages')->insert([
            'package_name' => 'diamond',
            'price' => '1000',
            'value' => '100000',
            'coin_id' => $coin->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('packages')->insert([
            'package_name' => 'master',
            'price' => '10000',
            'value' => '1000000',
            'coin_id' => $coin->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


    }
}
