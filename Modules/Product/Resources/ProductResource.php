<?php

declare(strict_types=1);

namespace Modules\Product\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'image' => $this->image,
            'summary' => $this->summary,
            'available' => $this->available,
            'price' => $this->price,
        ];
    }
}
