<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class FrameTableSeeder extends Seeder {




    public function run()
    {
        Eloquent::unguard();
            $faker = Faker::create();
            \App\Frame::create([
                'title'=>'مستطیلی',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
            \App\Frame::create([
                'title'=>'مربعی',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
            \App\Frame::create([
                'title'=>'دایره‌‌ای',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
    }



}