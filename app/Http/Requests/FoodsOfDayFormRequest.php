<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodsOfDayFormRequest extends FormRequest
{
    private $for_destroy_id;
    private $day_id;

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
        return [
            //
        ];
    }
}
