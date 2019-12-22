<?php

declare(strict_types=1);

namespace Modules\Order\Validators;

use Illuminate\Foundation\Http\FormRequest;

class OrderPointUpdateRequest extends FormRequest
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

        return OrderPointRule::rules();
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {

        return OrderPointRule::messages();
    }
}
