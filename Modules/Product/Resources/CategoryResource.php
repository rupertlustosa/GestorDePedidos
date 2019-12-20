<?php

declare(strict_types=1);

namespace Modules\Product\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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


            'parent_id' => $this->category->name,
            'name' => $this->name,
            'imagem' => $this->imagem,
        ];
    }
}