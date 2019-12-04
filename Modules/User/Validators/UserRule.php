<?php

declare(strict_types=1);

namespace Modules\User\Validators;

class UserRule
{

    /**
     * Validation rules that apply to the request.
     *
     * @var array
     */
    protected static $rules = [
        'id' => 'required|integer|exists:users,id,deleted_at,NULL',
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|string|min:8',
        //'password' => 'required|string|min:8|confirmed',
    ];

    /**
     * Return default rules
     *
     * @return array
     */
    public static function rules()
    {

        return [
            'name' => self::$rules['name'],
            'email' => self::$rules['email'],
            'password' => self::$rules['password'],
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
