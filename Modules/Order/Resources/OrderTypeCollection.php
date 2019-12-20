<?php

declare(strict_types=1);

namespace Modules\Order\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderTypeCollection extends ResourceCollection
{

    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = 'Modules\Order\Resources\OrderTypeResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
