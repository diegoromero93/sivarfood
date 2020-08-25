<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HomeChefsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_chefs')->insert([
            [
                'name' => 'Las Mixeaditas',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'mobile_phone' => '50377469711',
                'active' => true,
                'header_image' => '',
                'address' => 'Colo',
                'show_address' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
