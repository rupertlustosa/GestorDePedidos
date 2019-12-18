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
	    'summary' => 'nullable|max:255',
	    'description' => 'nullable',
	    'main' => 'required|boolean',
	    'price' => 'required',
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
            'summary' => self::$rules['summary'],
            'description' => self::$rules['description'],
            'main' => self::$rules['main'],
            'price' => self::$rules['price'],
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
