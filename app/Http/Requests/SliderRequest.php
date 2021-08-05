<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        $ruleArr =  [
            'name' => [
                'required',
                Rule::unique('slider')->ignore($this->id)
            ],
            'descripiton' => 'required'
        ];
        if($this->id == null){
            $ruleArr['image_path'] = 'required|mimes:jpg,bmp,png,jpeg';
        }else{
            $ruleArr['image_path'] = 'mimes:jpg,bmp,png,jpeg';
        }
        return $ruleArr;
    }

    public function messages()
    {
        return[
            'name.required' => 'Hãy nhập tên !',
            'name.unique' => 'Tên danh mục đã tồn tại.',
            'image_path.required' => 'Hãy chọn ảnh sản phẩm',
            'image_path.mimes' => 'File ảnh sản phẩm không đúng định dạng (jpg, bmp, png, jpeg)',
            'descripiton.required' => 'Hãy nhập nội dung',
        ];

        
    }
}
