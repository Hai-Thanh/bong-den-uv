<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',
            'customer_address' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'customer_name.required' => 'Nhập họ tên khách hàng. ',
            'customer_email.required' => 'Nhập địa chỉ email khách hàng',
            'customer_phone.required' => 'Nhập số điện thoại khách hàng',
            'customer_address.required' => 'Hãy nhập địa chỉ của khách hàng',
        ];
    }
}
