<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UsersRequest extends FormRequest
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
            'name' =>[
                'required',
                'max:50',
                'min:3',
            ],
            'email'  =>[
                'required',
                'max:50',
                'min:3',
                'email',
                Rule::unique('users')->ignore($this->id),
            ],
            'phone_number'  =>[
                'required',
                'max:14',
                'min:9',
                Rule::unique('users')->ignore($this->id),
            ],
            // 'avatar' => 'required',
        ];
    }


    public function messages()
    {
        return[
            'name.required' => 'Bạn cần nhập tên !',
            'name.max' => 'Tên thành viên quá dài',
            'name.min' => 'Tên thành viên quá  ngắn.',
            // 'avatar.required' => 'Hãy chọn ảnh thành viên.',
            'email.required' => 'Không được bỏ trống email !',
            'email.max' => 'Tài khoản email quá dài',
            'email.min' => 'Tài khoản email quá  ngắn.',
            'email.unique' => 'Đã tồn tại gmail này.',
            'email.email' => 'Hãy nhập đúng định dang email.',
            'phone_number.required' => 'Không được bỏ trống số điện thoại !',
            'phone_number.max' => 'Bạn nhập lại số điện thoại quá dài',
            'phone_number.min' => 'Bạn nhập lại số điện thoại quá  ngắn.',
            'phone_number.unique' => 'Đã tồn tại số điện thoại này.',
        ];

        
    }
}
