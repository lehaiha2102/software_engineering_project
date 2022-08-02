<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class billrequest extends FormRequest
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
            'name'          =>'required|min:1|max:100',
            'phone_number'  =>'required|unique:customers,phone_number,phone_number',
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
            'name'          =>'Tên khách hàng',
            'phone_number'  =>'Số điện thoại',
        ];
    }

}
