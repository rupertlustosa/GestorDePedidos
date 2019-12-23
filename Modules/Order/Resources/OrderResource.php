<?php

declare(strict_types=1);

namespace Modules\Order\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'attendant_id' => $this->attendant_id,
            'client_id' => $this->client_id,
            'deliveryman_id' => $this->deliveryman_id,
            'order_type_id' => $this->order_type_id,
            'order_status_id' => $this->order_status_id,
            'order_point_id' => $this->order_point_id,
            'notes' => $this->notes,
            'start_date' => $this->start_date,
            'output_to_delivery_date' => $this->output_to_delivery_date,
            'end_date' => $this->end_date,
        ];
    }
}
