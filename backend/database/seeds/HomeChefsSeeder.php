<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;


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
                'mobile_phone' => '50371320213',
                'active' => true,
                'header_image' => 'https://scontent-mia3-2.cdninstagram.com/v/t51.2885-19/s150x150/107516509_649423968996367_1386498700186139953_n.jpg?_nc_ht=scontent-mia3-2.cdninstagram.com&_nc_ohc=gxcOO-3lLuoAX-pgico&oh=64969ddf196178b1a2a20aa2db9f911d&oe=5F6D6782',
                'address' => 'Col. Centroamérica',
                'show_address' => true,
                'instagram_url' => 'https://www.instagram.com/lasmixeaditassv',
                'facebook_url' => 'https://www.facebook.com/lasmixeaditassv',
                'website_url' => '',
                'slug' => Str::slug('Las Mixeaditas'),
                'lat' => '13.682568',
                'lng' => '-89.278363',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Entre Fuegos',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'mobile_phone' => '50379288723',
                'active' => true,
                'header_image' => 'https://www.instagram.com/p/CEfbxkADX-K/media/?size=m',
                'address' => 'Col. Centroamérica',
                'show_address' => true,
                'instagram_url' => 'https://www.instagram.com/entrefuegossv/',
                'facebook_url' => 'https://www.instagram.com/entrefuegossv/',
                'website_url' => '',
                'slug' => Str::slug('Entre Fuegos'),
                'lat' => '13.682568',
                'lng' => '-89.278363',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Pizza Nostra',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'mobile_phone' => '50379288723',
                'active' => true,
                'header_image' => 'https://www.instagram.com/p/CEuiYj-jTVD/media/?size=m',
                'address' => 'Col. Centroamérica',
                'show_address' => true,
                'instagram_url' => 'https://www.instagram.com/pizzanostrasv/',
                'facebook_url' => 'https://www.instagram.com/pizzanostrasv/',
                'website_url' => '',
                'slug' => Str::slug('Pizza Nostra'),
                'lat' => '13.682568',
                'lng' => '-89.278363',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
