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
            'category' => $this->category->name,
            'name' => $this->name,
            'image' => $this->image,
            'notes' => $this->notes,
            'variations' => $this->variations->map(function ($item) {

                return [
                    'id' => (int)$item->id,
                    'code' => $item->code,
                    'name' => $item->name,
                    'notes' => $item->notes,
                    'price' => (float)$item->price,
                    'available' => (boolean)$item->available,
                ];
            }),
        ];
    }
}
