<?php

declare(strict_types=1);

namespace Modules\Authentication\Validators;

class RoleRule
{

    /**
     * Validation rules that apply to the request.
     *
     * @var array
     */
	protected static $rules = [
	    //'id' => 'required|integer|exists:roles,id,deleted_at,NULL',
	    'name' => 'required|max:255',
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
            'name' => self::$rules['name'],
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
