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

        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            $name = $faker->name;
            DB::table('home_chefs')->insert([
                'name' => $name,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'mobile_phone' => '50377469711',
                'active' => true,
                'header_image' => 'https://scontent-mia3-2.cdninstagram.com/v/t51.2885-19/s150x150/107516509_649423968996367_1386498700186139953_n.jpg?_nc_ht=scontent-mia3-2.cdninstagram.com&_nc_ohc=gxcOO-3lLuoAX-pgico&oh=64969ddf196178b1a2a20aa2db9f911d&oe=5F6D6782',
                'address' => 'Col. Centroamérica',
                'show_address' => true,
                'instagram_url' => 'https://www.instagram.com/lasmixeaditassv',
                'facebook_url' => 'https://www.facebook.com/lasmixeaditassv',
                'website_url' => '',
                'slug' => Str::slug($name),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        }


        /*DB::table('home_chefs')->insert([
            [
                'name' => 'Las Mixeaditas',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'mobile_phone' => '50377469711',
                'active' => true,
                'header_image' => 'https://scontent-mia3-2.cdninstagram.com/v/t51.2885-19/s150x150/107516509_649423968996367_1386498700186139953_n.jpg?_nc_ht=scontent-mia3-2.cdninstagram.com&_nc_ohc=gxcOO-3lLuoAX-pgico&oh=64969ddf196178b1a2a20aa2db9f911d&oe=5F6D6782',
                'address' => 'Col. Centroamérica',
                'show_address' => true,
                'instagram_url' => 'https://www.instagram.com/lasmixeaditassv',
                'facebook_url' => 'https://www.facebook.com/lasmixeaditassv',
                'website_url' => '',
                'slug' => Str::slug('Las Mixeaditas'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Entre Fuegos',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'mobile_phone' => '50377469711',
                'active' => true,
                'header_image' => 'https://scontent-mia3-2.cdninstagram.com/v/t51.2885-19/s320x320/100967992_859829414520885_5945161338203406336_n.jpg?_nc_ht=scontent-mia3-2.cdninstagram.com&_nc_ohc=oxATLAuB49wAX8q547s&oh=6eeeebb5b1efee3f986cab0d64fe6893&oe=5F6FAFF0',
                'address' => 'Col. Escalón',
                'show_address' => true,
                'instagram_url' => 'https://www.instagram.com/entrefuegossv',
                'facebook_url' => 'https://www.facebook.com/entrefuegossv',
                'website_url' => '',
                'slug' => Str::slug('Entre Fuegos'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);*/
    }
}
