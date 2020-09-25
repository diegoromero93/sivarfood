<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class HomeChef extends Model
{
    //

    /**
     * The home chef cuisine types
     */
    public function cuisineTypes()
    {
        return $this->belongsToMany('App\Http\Models\CuisineType');
    }

    public function scopeCloseTo($query, $location, $radius = 5)
    {
        /**
         * In order for this to work correctly, you need a $location object
         * with a ->latitude and ->longitude.
         */
        $haversine = "(6371 * acos(cos(radians($location->latitude)) * cos(radians(lat)) * cos(radians(lng) - radians($location->longitude)) + sin(radians($location->latitude)) * sin(radians(lat))))";

        return $query
            ->select(['id', 'name', 'description', 'mobile_phone', 'active', 'header_image', 'address', 'show_address', 'instagram_url', 'facebook_url', 'website_url', 'slug', 'lat', 'lng', 'created_at', 'updated_at'])
            ->selectRaw("{$haversine} AS distance")
            ->whereRaw("{$haversine} < ?", [$radius]);



        /*$restaurants = Restaurant::selectRaw("id, name, address, latitude, longitude, rating, zone ,
                         ( 6371000 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance"



        , [$latitude, $longitude, $latitude])
            ->where('active', '=', 1)
            ->having("distance", "<", $radius)
            ->orderBy("distance",'asc')
            ->offset(0)
            ->limit(20)
            ->get();*/
    }
}
