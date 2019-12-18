<?php

declare(strict_types=1);

namespace Modules\Product\Validators;

class CategoryRule
{

    /**
     * Validation rules that apply to the request.
     *
     * @var array
     */
	protected static $rules = [
	    //'id' => 'required|integer|exists:categories,id,deleted_at,NULL',
	    'parent_id' => 'nullable|integer|exists:categories,id,deleted_at,NULL',
	    'name' => 'required|max:255',
	    'imagem' => 'nullable',
	    //'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
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
            'parent_id' => self::$rules['parent_id'],
            'name' => self::$rules['name'],
            'imagem' => self::$rules['imagem'],
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
