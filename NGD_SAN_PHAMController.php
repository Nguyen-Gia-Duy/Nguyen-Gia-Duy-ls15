<?php

namespace App\Http\Controllers;
use App\Models\NGD_LOAI_SAN_PHAM;
use Illuminate\Http\Request;
use App\Models\NGD_SAN_PHAM;

class NGD_SAN_PHAMController extends Controller
{
    //CRUD:
    // Get READ all
    public function ngdlist()
    {
        $ngdSanPhams=NGD_SAN_PHAM::where('ngdTrangThai',0)->get();
        return view('NgdAdmins.ngdSanPham.ngdlist',['ngdSanPhams'=>$ngdSanPhams]);
    }
    //get;create
    public function ngdCreate()
    {
        //Doc du lieu tu bang loai san pham
        $ngdLoaiSanPhams = NGD_LOAI_SAN_PHAM::all();
        return view('NgdAdmins.ngdSanPham.ngd-create',['ngdLoaiSanPhams'=>$ngdLoaiSanPhams]);
    }
    //Post:Create Submit
    public function ngdCreateSubmit(Request $request)
    {
        //validation
        $validatedData = $request->validate
        ([
        'ngdMaSanPham' => 'required|unique:ngd_sanpham,ngdMaSanPham',
        'ngdTenSanPham' => 'required|string|max:255',
        'ngdHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        'ngdSoLuong' => 'required|numeric|min:1',
        'ngdDonGia' => 'required|numeric',
        'ngdMaLoai' => 'required|exists:ngd_loaisanpham,id',
        'ngdTrangThai' => 'required|in:0,1',
        ]);
          // Khởi tạo đối tượng vtd_SAN_PHAM và lưu thông tin vào cơ sở dữ liệu
    $ngdsanpham = new NGD_SAN_PHAM;
    $ngdsanpham->ngdMaSanPham = $request->ngdMaSanPham;
    $ngdsanpham->ngdTenSanPham = $request->ngdTenSanPham;

    // Kiểm tra nếu có tệp hình ảnh
    if ($request->hasFile('ngdHinhAnh')) {
        // Lấy tệp hình ảnh
        $file = $request->file('ngdHinhAnh');

        // Kiểm tra nếu tệp hợp lệ
        if ($file->isValid()) {
            // Tạo tên tệp dựa trên mã sản phẩm
            $fileName = $request->vtdMaSanPham . '.' . $file->extension();

            // Lưu tệp vào thư mục public/img/san_pham
            $file->storeAs('public/img/san_pham', $fileName); // Lưu tệp vào thư mục storage/app/public/img/san_pham

            // Lưu đường dẫn vào cơ sở dữ liệu
            $ngdsanpham->ngdHinhAnh = 'img/san_pham/' . $fileName; // Lưu đường dẫn tương đối trong CSDL
        }
    }

    // Lưu các thông tin còn lại vào cơ sở dữ liệu
    $ngdsanpham->ngdSoLuong = $request->ngdSoLuong;
    $ngdsanpham->ngdDonGia = $request->ngdDonGia;
    $ngdsanpham->ngdMaLoai = $request->ngdMaLoai;
    $ngdsanpham->ngdTrangThai = $request->ngdTrangThai;

    // Lưu dữ liệu vào cơ sở dữ liệu
    $ngdsanpham->save();

    // Chuyển hướng người dùng về trang danh sách sản phẩm
    return redirect()->route('ngdadmins.ngdsanpham');
    }
    public function ngdDetail($id)
    {
        // Tìm sản phẩm theo ID
        $ngdsanpham = NGD_SAN_PHAM::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('NgdAdmins.ngdSanPham.ngd-detail', ['ngdsanpham' => $ngdsanpham]);
    }
    public function ngdddelete($id)
{
    NGD_SAN_PHAM::where('id',$id)->delete();
return back()->with('sanpham_deleted','Đã xóa Sản Phẩm thành công!');
}


}
