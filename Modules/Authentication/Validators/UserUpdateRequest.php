<?php

declare(strict_types=1);

namespace Modules\Authentication\Validators;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = UserRule::rules();
        $rules['email'] = 'required|email|max:255|unique:users,email,'.request('user')->id;
        $rules['password'] = str_replace('required', 'nullable', $rules['password']);
        return $rules;
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {

        return UserRule::messages();
    }
}
