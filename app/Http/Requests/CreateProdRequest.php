<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProdRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'sanpham'               => 'required|array',
            'sanpham.ten_san_pham'  => 'required|min:5|max:255|unique:products,ten_san_pham',
            'sanpham.hinh_anh'      => 'required|unique:products,hinh_anh',
            'sanpham.mo_ta'         => 'required',
            'sanpham.danh_muc_id'   => 'required|numeric',
            'sanpham.thuong_hieu_id'=> 'required|numeric',
            // 'sanpham.luot_xem'      trong bảng tạo sẵn là 0 rồi cần j đk
            'sanpham.gia'           => 'required|numeric',
            'sanpham.tinh_trang'    => 'required|in: 0, 1',

            'options'               => 'required|array',
            'options.*.cau_hinh_id'   => 'required|numeric',
            'options.*.gia_dieu_chinh'=> 'required',                        //thêm sao để nó duyệt được phần mảng
            'options.*.mau_sac_id'    => 'required|numeric',
            'options.*.so_luong'      => 'required|numeric|gt:0|max:9999',     //lớn hơn 0
        ];
    }

    public function messages()
    {
        return [
            'sanpham.ten_san_pham.required'  => 'vui lòng nhập ',
            'sanpham.ten_san_pham.unique'      => 'sản phẩm đã tồn tại !',
            'sanpham.mo_ta.required'         => 'Mô tả không được để trống !',
            'sanpham.danh_muc_id.*'   => 'Vui lòng chọn danh mục',
            'sanpham.thuong_hieu_id.*'=> 'Vui lòng chọn thương hiệu',
            // 'sanpham.luot_xem'      trong bảng tạo sẵn là 0 rồi cần j đk
            'sanpham.gia.*'           => 'Giá không được để trống !',
            'sanpham.tinh_trang.*'    => 'Vui lòng chọn tình trạng !',

            'options'                   => 'required|array',
            'options.*.cau_hinh_id.*'   => 'Vui lòng chọn đầy đủ cấu hình cho options sản phẩm',
            'options.*.gia_dieu_chinh.*'=> 'Vui lòng chọn đầy đủ giá cho options sản phẩm',                        //thêm sao để nó duyệt được phần mảng
            'options.*.mau_sac_id.*'      => 'Vui lòng chọn đầy đủ màu sắc cho options sản phẩm',
            'options.*.so_luong.*'        => 'Vui lòng nhập số lượng cho options',     //lớn hơn 0

        ];
    }
}
