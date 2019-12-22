<?php

declare(strict_types=1);

namespace Modules\Product\Validators;

class ProductRule
{

    /**
     * Validation rules that apply to the request.
     *
     * @var array
     */
    protected static $rules = [
        //'id' => 'required|integer|exists:products,id,deleted_at,NULL',
        'category_id' => 'required|integer|exists:categories,id,deleted_at,NULL',
        'name' => 'required|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        'notes' => 'nullable|max:600',

        'variations' => 'required|array',
        'variations_code' => 'nullable|max:255',
        'variations_name' => 'required|max:255',
        'variations_price' => 'required|regex:/\d+\.\d+,\d+/i',
        'variations_available' => 'boolean',
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
            'category_id' => self::$rules['category_id'],
            'name' => self::$rules['name'],
            'image' => self::$rules['image'],
            'notes' => self::$rules['notes'],
            'variations' => self::$rules['variations'],
            'variations.*.code' => self::$rules['variations_code'],
            'variations.*.name' => self::$rules['variations_name'],
            'variations.*.price' => self::$rules['variations_price'],
            'variations.*.available' => self::$rules['variations_available'],
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
