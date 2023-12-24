<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStorerequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nameProduct' => 'required|max: 55',
            'brand' => 'required',
            'idProduct' => 'required|unique:products',
            'imgProduct' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'priceProduct' => 'required|numeric',
            'quantityProduct' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'nameProduct.required' => 'Tên sản phẩm là bắt buộc',
            'nameProduct.max' => 'Tên sản phẩm là quá dài. Tối đa 55 kí tự',
            'brand.required' => 'Hãng là bắt buộc',
            'idProduct.required' => 'Mã sản phẩm là bắt buộc',
            'idProduct.unique' => 'Mã sản phẩm là đã tồn tại',
            'imgProduct.required' => 'Hình ảnh là bắt buộc',
            'imgProduct.image' => 'File tải lên phải là hình ảnh',
            'imgProduct.mimes' => 'File hình ảnh không đúng định dạng',
            'priceProduct.required' => 'Giá sản phẩm là bắt buộc',
            'quantityProduct.required' => 'Số lượng sản phẩm là bắt buộc',
            'quantityProduct.numeric' => 'Số lượng sản phẩm là chữ số'
        ];
    }
}
