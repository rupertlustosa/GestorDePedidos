<?php

declare(strict_types=1);

namespace Modules\Authentication\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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

            'id' => (integer)$this->id,
            'name' => (string)$this->name,
        ];
    }
}
