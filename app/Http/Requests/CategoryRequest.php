<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'CategoryName' => 'required|min:1|max:100|unique:categories,CategoryName,CategoryName',
        ];
    }
    public function  messages()
    {
        return [
            'required'                  =>':attribute không được để trống',
            'max'                       =>':attribute có độ dài quá lớn',
            'min'                       =>':attribute không đạt độ dài tối thiểu',
            'unique'                    =>':attribute không được trùng nhau',
        ];
    }
    public function attributes()
    {
        return [
            'CategoryName'           =>'Tên danh mục',
        ];
    }
}
