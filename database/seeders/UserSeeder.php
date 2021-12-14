<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin=User::create([
            'firstname'=>'mahesh',
            'lastname'=>'dissanayaka',
            'email'=>'dmahesh9810@gmail.com',
            'country'=>'srilanka',
            'city'=>'buttala',
            'mobile'=>'0773355669',
            'email_verified_at' => now(),
            'password'=>Hash::make('mac@iqbrave9895&&')
        ]);
        $admin->assignRole('ROLE_ADMIN');

        $moderator=User::create([
            'firstname'=>'sachi',
            'lastname'=>'herath',
            'email'=>'sachiherath507@gmail.com',
            'country'=>'india',
            'city'=>'bandarawela',
            'mobile'=>'0773355667',
            'email_verified_at' => now(),
            'password'=>Hash::make('mac@brave507&&')
        ]);
        $moderator->assignRole('ROLE_MODERATOR');
    }
}
