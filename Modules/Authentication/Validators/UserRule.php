<?php

declare(strict_types=1);

namespace Modules\Authentication\Validators;

class UserRule
{

    /**
     * Validation rules that apply to the request.
     *
     * @var array
     */
    protected static $rules = [
        //'id' => 'required|integer|exists:users,id,deleted_at,NULL',
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'roles' => 'required|array',
        'role_id' => 'required|integer|exists:roles,id,deleted_at,NULL',
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
            'email' => self::$rules['email'],
            'password' => self::$rules['password'],
            'roles' => self::$rules['roles'],
            'roles.*' => self::$rules['role_id'],
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
