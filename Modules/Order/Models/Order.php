<?php

declare(strict_types=1);

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attendant_id',
        'client_id',
        'deliveryman_id',
        'order_type_id',
        'order_status_id',
        'order_point_id',
        'notes',
        'start_date',
        'output_to_delivery_date',
        'end_date',
    ];

    # Accessors & Mutators

    # Relationships
}
