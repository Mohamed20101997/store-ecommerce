<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingsRequest extends FormRequest
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

    public function rules()
    {
        return [
            'id'          =>'required|exists:settings',
            'value'       =>'required',
            'plain_value' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [

            'id.exists'     => 'رمز غير صحيح',
            'value.required'       => 'يجب إدخال نوع الشحن',
            'plain_value.numeric' => 'يجب ادخال ارقام فقط',
            'plain_value.required' => 'يجب أدخال قيمة الشحن'
        ];
    }
}
