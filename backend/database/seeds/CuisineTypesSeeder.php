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
                'name' => 'Italiana',
                'description' => 'Italiana',
                'favicon' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'India',
                'description' => 'India',
                'favicon' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Mexicana',
                'description' => 'Mexicana',
                'favicon' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'China',
                'description' => 'China',
                'favicon' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Sushi',
                'description' => 'Sushi',
                'favicon' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);

    }
}
