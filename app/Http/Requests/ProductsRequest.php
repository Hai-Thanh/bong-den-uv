<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ProductsRequest extends FormRequest
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
                Rule::unique('products')->ignore($this->id),
            ],
            'image_path' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'content' => 'required',
        ];
    }


    public function messages()
    {
        return[
            'name.required' => 'Hãy nhập tên !',
            'name.unique' => 'Tên danh mục đã tồn tại.',
            'name.max' => 'Tên danh mục quá dài',
            'name.min' => 'Tên danh mục quá  ngắn.',
            'image_path.required' => 'Hãy chọn ảnh sản phẩm.',
            'quantity.required' => 'Hãy nhập số lượng sản phẩm!',
            'price.required' => 'Hãy nhập số lượng sản phẩm!',
            'content.required' => 'Hãy nhập chi tiết sản phẩm!',
        ];

        
    }



}
