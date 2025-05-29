<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'category'       => $this->category,
            'ingredients'    => $this->ingredients,
            'image'          => $this->image,
            'is_recommended' => $this->is_recommended,
            'is_popular'     => $this->is_popular,
        ];
    }
}
