<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaptopRequest extends FormRequest
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
        return [
            'name' => 'required|min:2|max:50|regex:/^[a-z0-9 ,.\'-]+$/i',
            'chip' => 'required|min:2|max:128|regex:/^[a-z0-9 ,.\'-]+$/i',
            'card' => 'required|min:2|max:128|regex:/^[a-z0-9 ,.\'-]+$/i',
            'number' => 'required|min:1|max:3|regex:/^[0-9 ,.\'-]+$/i',
        ];
    }
}
