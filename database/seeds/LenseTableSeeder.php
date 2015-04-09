<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LenseTableSeeder extends Seeder {




    public function run()
    {
        Eloquent::unguard();
            $faker = Faker::create();
            \App\Lense::create([
                'title'=>'خاکستری',
                'price'=>'100000',
                'image'=>'/images/lenses/1.png',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
            \App\Lense::create([
                'title'=>'قهوه‌ای',
                'price'=>'150000',
                'image'=>'/images/lenses/2.png',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
            \App\Lense::create([
                'title'=>'قرمز',
                'price'=>'170000',
                'image'=>'/images/lenses/4.png',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);

    }



}