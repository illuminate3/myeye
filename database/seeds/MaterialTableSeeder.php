<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder {




    public function run()
    {
        Eloquent::unguard();
            $faker = Faker::create();
            \App\Material::create([
                'title'=>'چوب گردو',
                'image'=>'/images/materials/gerdoo.jpg',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
            \App\Material::create([
                'title'=>'چوب کاج',
                'image'=>'/images/materials/kaj.jpg',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
            \App\Material::create([
                'title'=>'چوب سرو',
                'image'=>'/images/materials/sarv.jpg',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
            \App\Material::create([
                'title'=>'چوب کاج-سرو',
                'image'=>'/images/materials/kaj-sarv.jpg',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
    }



}