<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loginDetails = [
            [
                'name' => 'piya shrestha',
                'email' => 'piya.shrestha@yahoo.com',
                'password' => Hash::make('DEADhen500'),
                'created_at' => \Illuminate\Support\Carbon::now(),
                'updated_at' => \Illuminate\Support\Carbon::now(),
            ],
            [
                'name' => 'prema lamichhane',
                'email' => 'prema@gmail.com',
                'password' => Hash::make('DEADhen500'),
                'created_at' => \Illuminate\Support\Carbon::now(),
                'updated_at' => \Illuminate\Support\Carbon::now(),
            ],
            [
                'name' => 'sneha shrestha',
                'email' => 'sneha.shrestha@gmail.com',
                'password' => Hash::make('DEADhen500'),
                'created_at' => \Illuminate\Support\Carbon::now(),
                'updated_at' => \Illuminate\Support\Carbon::now(),
            ],
            [
                'name' => 'piyush shrestha',
                'email' => 'piyush.shrestha@gmail.com',
                'password' => Hash::make('DEADhen500'),
                'created_at' => \Illuminate\Support\Carbon::now(),
                'updated_at' => \Illuminate\Support\Carbon::now(),
            ],
            [
                'name' => 'ishika kayastha',
                'email' => 'ishika.kayastha@gmail.com',
                'password' => Hash::make('DEADhen500'),
                'created_at' => \Illuminate\Support\Carbon::now(),
                'updated_at' => \Illuminate\Support\Carbon::now(),
            ],
            [
                'name' => 'prema shrestha',
                'email' => 'prema.shrestha@yahoo.com',
                'password' => Hash::make('DEADhen500'),
                'created_at' => \Illuminate\Support\Carbon::now(),
                'updated_at' => \Illuminate\Support\Carbon::now(),
            ]
        ];
        foreach ($loginDetails as $loginDetail) {
            User::create($loginDetail);
        }

    }
}
