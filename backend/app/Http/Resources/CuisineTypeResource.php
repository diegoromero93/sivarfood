<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CuisineTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /*
         *
            created_at: "2020-09-16T23:39:29.000000Z"
            description: "La mejor pizza artesanal"
            favicon: "icon-food_icon_pizza"
            id: 1
            name: "Pizza"
            updated_at: null
        */
        return [
            'created_at' => $this->created_at,
            'description' => $this->description,
            'favicon' => $this->favicon,
            'id' => $this->id,
            'name' => $this->name,
            'updated_at' => $this->updated_at,
            'homechefs_count' => $this->homeChefs()->count()
        ];
    }
}
