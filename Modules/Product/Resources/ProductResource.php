<?php

declare(strict_types=1);

namespace Modules\Product\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'category_id' => $this->category_id,
            'name' => $this->name,
            'summary' => $this->summary,
            'description' => $this->description,
            'main' => $this->main,
            'price' => $this->price,
        ];
    }
}
