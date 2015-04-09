<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder {




    public function run()
    {

        Eloquent::unguard();
        $faker = Faker::create();
        \App\MaterialProduct::create([
            'material_id'=>1,
            'product_id'=>1,
            'price'=>300000,
            'image_item_front'=>'/images/products_item/gerdoo-front.jpg',
            'image_item_side'=>'/images/products_item/gerdoo-side.jpg',
            'image_main_front'=>'/images/product/gerdoo-front.jpg',
            'image_main_side'=>'/images/product/gerdoo-side.jpg',
            'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
            'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
        ]);
        \App\MaterialProduct::create([
            'material_id'=>2,
            'product_id'=>1,
            'price'=>240000,
            'image_item_front'=>'/images/products_item/kaj-front.jpg',
            'image_item_side'=>'/images/products_item/kaj-side.jpg',
            'image_main_front'=>'/images/product/kaj-front.jpg',
            'image_main_side'=>'/images/product/kaj-side.jpg',
            'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
            'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
        ]);
        \App\MaterialProduct::create([
            'material_id'=>3,
            'product_id'=>1,
            'price'=>180000,
            'image_item_front'=>'/images/products_item/sarv-front.jpg',
            'image_item_side'=>'/images/products_item/sarv-side.jpg',
            'image_main_front'=>'/images/product/sarv-front.jpg',
            'image_main_side'=>'/images/product/sarv-side.jpg',
            'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
            'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
        ]);

    }



}