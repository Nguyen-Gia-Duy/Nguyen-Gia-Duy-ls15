<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NGD_HOA_DON; 
use App\Models\NGD_KHACH_HANG; 
class NGD_HOA_DONController extends Controller
{
    //
      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function ngdList()
    {
        $ngdhoadons = NGD_HOA_DON::all();
        return view('NgdAdmins.ngdhoadon.ngd-list',['ngdhoadons'=>$ngdhoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function ngdDetail($id)
    {
        // Tìm sản phẩm theo ID
        $ngdhoadon = NGD_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('NgdAdmins.ngdhoadon.ngd-detail', ['ngdhoadon' => $ngdhoadon]);
    }
    // create
    public function ngdCreate()
    {
        $ngdkhachhang = NGD_KHACH_HANG::all();
        return view('NgdAdmins.ngdhoadon.ngd-create',['ngdkhachhang'=>$ngdkhachhang]);
    }
    //post
    public function ngdCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'ngdMaHoaDon' => 'required|unique:ngd_hoadon,ngdMaHoaDon',
            'ngdMaKhachHang' => 'required|exists:ngd_khachhang,id',
            'ngdNgayHoaDon' => 'required|date',  
            'ngdNgayNhan' => 'required|date',
            'ngdHoTenKhachHang' => 'required|string',  
            'ngdEmail' => 'required|email',
            'ngdDienThoai' => 'required|numeric',  
            'ngdDiaChi' => 'required|string',  
            'ngdTongGiaTri' => 'required|numeric',  // Đã thay đổi thành numeric (cho kiểu double)
            'ngdTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Tạo một bản ghi hóa đơn mới
        $ngdhoadon = new NGD_HOA_DON;
    
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $ngdhoadon->ngdMaHoaDon = $request->ngdMaHoaDon;
        $ngdhoadon->ngdMaKhachHang = $request->ngdMaKhachHang;  // Giả sử đây là khóa ngoại
        $ngdhoadon->ngdHoTenKhachHang = $request->ngdHoTenKhachHang;
        $ngdhoadon->ngdEmail = $request->ngdEmail;
        $ngdhoadon->ngdDienThoai = $request->ngdDienThoai;
        $ngdhoadon->ngdDiaChi = $request->ngdDiaChi;
        
        // Lưu 'vtdTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $ngdhoadon->ngdTongGiaTri = (double) $request->ngdTongGiaTri; // Chuyển đổi sang double
        
        $ngdhoadon->ngdTrangThai = $request->ngdTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $ngdhoadon->ngdNgayHoaDon = $request->ngdNgayHoaDon;
        $ngdhoadon->ngdNgayNhan = $request->ngdNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $ngdhoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('ngdadmins.ngdhoadon');
    }
    


    public function vtdEdit($id)
    {
        $ngdhoadon = NGD_HOA_DON::where('id', $id)->first();
        $ngdkhachhang = NGD_KHACH_HANG::all();
        return view('NgdAdmins.ngdhoadon.ngd-edit',['ngdkhachhang'=>$ngdkhachhang,'ngdhoadon'=>$ngdhoadon]);
    }
    //post
    public function ngdEditSubmit(Request $request,$id)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'ngdMaHoaDon' => 'required|unique:ngd_hoa_don,ngdMaHoaDon,'. $id,
            'ngdMaKhachHang' => 'required|exists:ngd_khachhang,id',
            'ngdNgayHoaDon' => 'required|date',  
            'ngdNgayNhan' => 'required|date',
            'ngdHoTenKhachHang' => 'required|string',  
            'ngdEmail' => 'required|email',
            'ngdDienThoai' => 'required|numeric',  
            'ngdDiaChi' => 'required|string',  
            'ngdTongGiaTri' => 'required|numeric', 
            'ngdTrangThai' => 'required|in:0,1,2',
        ]);
    
        $ngdhoadon = NGD_HOA_DON::where('id', $id)->first();
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $ngdhoadon->ngdMaHoaDon = $request->ngdMaHoaDon;
        $ngdhoadon->ngdMaKhachHang = $request->ngdMaKhachHang;  // Giả sử đây là khóa ngoại
        $ngdhoadon->ngdHoTenKhachHang = $request->ngdHoTenKhachHang;
        $ngdhoadon->ngdEmail = $request->ngdEmail;
        $ngdhoadon->ngdDienThoai = $request->ngdDienThoai;
        $ngdhoadon->ngdDiaChi = $request->ngdDiaChi;
        
        // Lưu 'vtdTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $ngdhoadon->ngdTongGiaTri = (double) $request->ngdTongGiaTri; // Chuyển đổi sang double
        
        $ngdhoadon->ngdTrangThai = $request->ngdTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $ngdhoadon->ngdNgayHoaDon = $request->ngdNgayHoaDon;
        $ngdhoadon->ngdNgayNhan = $request->ngdNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $ngdhoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('ngdadmins.ngdhoadon');
    }
    
        //delete
        public function ngdDelete($id)
        {
            NGD_HOA_DON::where('id',$id)->delete();
            return back()->with('hoadon_deleted','Đã xóa Khách hàng thành công!');
        }
}