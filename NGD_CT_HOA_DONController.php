<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NGD_CT_HOA_DON; 
use App\Models\NGD_SAN_PHAM; 
use App\Models\NGD_HOA_DON; 

class NGD_CT_HOA_DONController extends Controller
{
    //
      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function ngdList()
    {
        $ngdcthoadons = NGD_CT_HOA_DON::all();
        return view('NgdAdmins.ngdcthoadon.ngd-list',['ngdcthoadons'=>$ngdcthoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function ngdDetail($id)
    {
        // Tìm sản phẩm theo ID
        $ngdcthoadon = NGD_CT_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('ngdAdmins.ngdcthoadon.ngd-detail', ['ngdcthoadon' => $ngdcthoadon]);
    }

     // create-----------------------------------------------------------------------------------------------------------------------------------------
     public function ngdCreate()
     {
         $ngdhoadon = NGD_HOA_DON::all();
         $ngdsanpham = NGD_SAN_PHAM::all();
         return view('NgdAdmins.ngdcthoadon.ngd-create',['ngdhoadon'=>$ngdhoadon,'ngdsanpham'=>$ngdsanpham]);
     }
     //post-----------------------------------------------------------------------------------------------------------------------------------------
     public function ngdCreateSubmit(Request $request)
     {
         // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
         $validate = $request->validate([
             'ngdHoaDonID' => 'required|exists:ngd_hoadon,id',
             'ngdSanPhamID' => 'required|exists:ngd_sanpham,id',
             'ngdSoLuongMua' => 'required|numeric',  
             'ngdDonGiaMua' => 'required|numeric',
             'ngdThanhTien' => 'required|numeric',  
             'ngdTrangThai' => 'required|in:0,1,2',
         ]);
     
         // Tạo một bản ghi hóa đơn mới
         $ngdcthoadon = new NGD_CT_HOA_DON;
     
         // Gán dữ liệu xác thực vào các thuộc tính của mô hình
         $ngdcthoadon->ngdHoaDonID = $request->ngdHoaDonID;
         $ngdcthoadon->ngdSanPhamID = $request->ngdSanPhamID;  
         $ngdcthoadon->ngdSoLuongMua = $request->ngdSoLuongMua;
         $ngdcthoadon->ngdDonGiaMua = $request->ngdDonGiaMua;
         $ngdcthoadon->ngdThanhTien = $request->ngdThanhTien;
         $ngdcthoadon->ngdTrangThai = $request->ngdTrangThai;
     
        
     
         // Lưu bản ghi mới vào cơ sở dữ liệu
         $ngdcthoadon->save();
     
         // Chuyển hướng đến danh sách hóa đơn
         return redirect()->route('ngdadmins.ngdcthoadon');
     }

      // edit-----------------------------------------------------------------------------------------------------------------------------------------
      public function ngdEdit($id)
{
    $ngdhoadon = NGD_HOA_DON::all(); // Lấy tất cả các hóa đơn
    $ngdsanpham = NGD_SAN_PHAM::all(); // Lấy tất cả các sản phẩm

    // Lấy chi tiết hóa đơn cần chỉnh sửa
    $ngdcthoadon = NGD_CT_HOA_DON::where('id', $id)->first();

    if (!$ngdcthoadon) {
        // Nếu không tìm thấy chi tiết hóa đơn, chuyển hướng với thông báo lỗi
        return redirect()->route('ngdadmins.ngdcthoadon')->with('error', 'Không tìm thấy chi tiết hóa đơn!');
    }

    // Trả về view với dữ liệu
    return view('NgdAdmins.ngdcthoadon.ngd-edit', [
        'ngdhoadon' => $ngdhoadon,
        'ngdsanpham' => $ngdsanpham,
        'ngdcthoadon' => $ngdcthoadon
    ]);
}

      //post-----------------------------------------------------------------------------------------------------------------------------------------
      public function ngdEditSubmit(Request $request,$id)
      {
          // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
          $validate = $request->validate([
              'ngdHoaDonID' => 'required|exists:ngd_hoadon,id',
              'ngdSanPhamID' => 'required|exists:ngd_sanpham,id',
              'ngdSoLuongMua' => 'required|numeric',  
              'ngdDonGiaMua' => 'required|numeric',
              'ngdThanhTien' => 'required|numeric',  
              'ngdTrangThai' => 'required|in:0,1,2',
          ]);
         
      
          // Tạo một bản ghi hóa đơn mới
          $ngdcthoadon = NGD_CT_HOA_DON::where('id', $id)->first();
      
          // Gán dữ liệu xác thực vào các thuộc tính của mô hình
          $ngdcthoadon->ngdHoaDonID = $request->ngdHoaDonID;
          $ngdcthoadon->ngdSanPhamID = $request->ngdSanPhamID;  
          $ngdcthoadon->ngdSoLuongMua = $request->ngdSoLuongMua;
          $ngdcthoadon->ngdDonGiaMua = $request->ngdDonGiaMua;
          $ngdcthoadon->ngdThanhTien = $request->ngdThanhTien;
          $ngdcthoadon->ngdTrangThai = $request->ngdTrangThai;
      
         
      
          // Lưu bản ghi mới vào cơ sở dữ liệu
          $ngdcthoadon->save();
      
          // Chuyển hướng đến danh sách hóa đơn
          return redirect()->route('ngdadmins.ngdcthoadon');
      }

        //delete
        public function ngdDelete($id)
        {
            NGD_CT_HOA_DON::where('id',$id)->delete();
            return back()->with('cthoadon_deleted','Đã xóa Khách hàng thành công!');
        }
     
}