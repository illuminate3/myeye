<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SunglassesLensesTableSeeder extends Seeder {




    public function run()
    {
        Eloquent::unguard();
        $faker = Faker::create();
        foreach(range(1, 24) as $index) {
            \App\Sunglass_Lense::create([
                'material_product_id' => ($index + 1),
                'lense_id' => 1,
                'image_main_front' => '/images/sunglasses_lenses/brownf.jpg',
                'image_main_side' => '/images/sunglasses_lenses/browns.jpg',
                'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
            \App\Sunglass_Lense::create([
                'material_product_id' => ($index + 1),
                'lense_id' => 2,
                'image_main_front' => '/images/sunglasses_lenses/circleBrownf.jpg',
                'image_main_side' => '/images/sunglasses_lenses/circleBrowns.jpg',
                'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
        }
    }



}