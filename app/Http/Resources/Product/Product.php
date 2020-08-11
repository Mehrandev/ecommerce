<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => number_format($this->price),
            'description' => $this->description,
            'quantity' => $this->quantity,
            'image_url' => $this->image_url,
            'category' => new Category($this->category)
        ];
    }
}
