<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productrequest extends FormRequest
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
            'ProductName'=>'required|min:1|max:100|unique:products,ProductName,ProductName',
            'ProductUnit'=>'required|min:1|max:100',
            'ProductImage'=>'required',
            'ProductPurchasePrice'=>'required|interger|4',
            'ProductPrice'=>'required|interger|4',
            'ProductPromotionPrice'=>'required|interger|4',
        ];
    }
    public function  messages()
    {
        return [
            'required'                  =>':attribute không được để trống',
            'max'                       =>':attribute có độ dài quá lớn',
            'min'                       =>':attribute không đạt độ dài tối thiểu',
            'unique'                    =>':attribute không được trùng nhau',
            'integer'                   =>':attribute không được nhập kiểu dữ liệu khác kiểu số',
        ];
    }
    public function attributes()
    {
        return [
            'CategoryName'           =>'Tên danh mục',
            'ProductName'            =>'Tên sản phẩm',
            'ProductUnit'            =>'Đơn vị tính',
            'ProductImage'           =>'Hình ảnh',
            'ProductPurchasePrice'   =>'Giá nhập',
            'ProductPrice'           =>'Giá bán',
            'ProductPromotionPrice'  =>'Giá khuyến mãi',
        ];
    }
}
