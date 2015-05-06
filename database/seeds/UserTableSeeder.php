<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {




    public function run()
    {
        Eloquent::unguard();
            $faker = Faker::create();
            \App\User::create([
                'name'=>'admin',
                'email'=>'admin@admin.com',
                'password'=>Hash::make('654321'),
                'role'=>'1',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
            \App\User::create([
                'name'=>'ali',
                'email'=>'ali@ali.com',
                'password'=>Hash::make('123456'),
                'role'=>'0',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);


    }



}