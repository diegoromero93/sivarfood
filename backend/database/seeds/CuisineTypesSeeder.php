<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CuisineTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cuisine_types')->insert([
            [
                'name' => 'Pizza',
                'description' => 'La mejor pizza artesanal',
                'favicon' => 'icon-food_icon_pizza',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Sushi',
                'description' => 'El mejor sushi artesanal de sivar',
                'favicon' => 'icon-food_icon_sushi',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Hamburguesas',
                'description' => 'Mexicana',
                'favicon' => 'icon-food_icon_burgher',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Vegetariana',
                'description' => 'icon-food_icon_vegetarian',
                'favicon' => 'icon-food_icon_vegetarian',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Postres',
                'description' => 'Postres',
                'favicon' => 'icon-food_icon_cake_2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'China',
                'description' => '',
                'favicon' => 'icon-food_icon_chinese',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Mexicana',
                'description' => '',
                'favicon' => 'icon-food_icon_burrito',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);

    }
}
