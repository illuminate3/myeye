<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class Material_ProductTableSeeder extends Seeder {




    public function run()
    {
        $faker = Faker::create();
        $frame_ids = \App\Frame::lists('id');
        $types = [1,0];

        Eloquent::unguard();
        foreach(range(1, 20) as $index)
        {
            \App\Product::create([
                'frame_id' => $faker->randomElement($frame_ids),
                'title'=>$faker->word,
                'type'=>$faker->randomElement($types),
                'detail'=>'محصول بسیاااااااااار عالی و خوووووووووووووووووووووووووووووووووووووووووووووب ',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
        }

    }



}