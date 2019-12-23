<?php

declare(strict_types=1);

namespace Modules\Order\Validators;

class OrderRule
{

    /**
     * Validation rules that apply to the request.
     *
     * @var array
     */
    protected static $rules = [
        //'id' => 'required|integer|exists:orders,id,deleted_at,NULL',
        'attendant_id' => 'required|integer|exists:users,id,deleted_at,NULL',
        'client_id' => 'nullable|integer|exists:users,id,deleted_at,NULL',
        'deliveryman_id' => 'nullable|integer|exists:users,id,deleted_at,NULL',
        'order_type_id' => 'required|integer|exists:order_types,id,deleted_at,NULL',
        'order_status_id' => 'required|integer|exists:order_statuses,id,deleted_at,NULL',
        'order_point_id' => 'nullable|integer|exists:order_points,id,deleted_at,NULL',
        'notes' => 'nullable',
        'start_date' => 'required|date_format:d/m/Y H:i',
        'output_to_delivery_date' => 'nullable|date_format:d/m/Y H:i',
        'end_date' => 'nullable|date_format:d/m/Y H:i',
    ];

    /**
     * Return default rules
     *
     * @return array
     */
    public static function rules()
    {

        return [
            //'id' => self::$rules['id'],
            'attendant_id' => self::$rules['attendant_id'],
            'client_id' => self::$rules['client_id'],
            'deliveryman_id' => self::$rules['deliveryman_id'],
            'order_type_id' => self::$rules['order_type_id'],
            'order_status_id' => self::$rules['order_status_id'],
            'order_point_id' => self::$rules['order_point_id'],
            'notes' => self::$rules['notes'],
            'start_date' => self::$rules['start_date'],
            'output_to_delivery_date' => self::$rules['output_to_delivery_date'],
            'end_date' => self::$rules['end_date'],
        ];
    }

    /**
     * Return default messages
     *
     * @return array
     */
    public static function messages()
    {

        return [];
    }
}
