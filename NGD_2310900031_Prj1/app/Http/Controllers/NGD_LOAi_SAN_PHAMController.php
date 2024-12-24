<?php

namespace App\Http\Controllers;
use App\Models\NGD_LOAI_SAN_PHAM;
use Illuminate\Http\Request;

class NGD_LOAi_SAN_PHAMController extends Controller
{
    //admins:CRUD
    //list
    public function ngdlist()
    {
        $ngdLoaiSanPhams = NGD_LOAI_SAN_PHAM::all();
        return view('NgdAdmins.ngdLoaiSanPham.ngdlist',['ngdLoaiSanPhams'=>$ngdLoaiSanPhams]);
    }
//create
public function ngdCreate()
{
    return view('NgdAdmins.ngdLoaiSanPham.ngdcreate');
}
//create submit
public function ngdCreateSubmit(Request $request)
{
    //Validation data
    $validationData=$request->validate([
        'ngdMaLoai'=>'required|',
        'ngdTenLoai'=>'required',
    ]);
    //ghi du lieu xuong db
    $ngdLoaiSanPham = new NGD_LOAI_SAN_PHAM;
    $ngdLoaiSanPham->ngdMaLoai=$request->ngdMaLoai;
    $ngdLoaiSanPham->ngdTenLoai->$request->ngdTenLoai;
    $ngdLoaiSanPham->ngdTrangThai->$request->ngdTrangThai;
    $ngdLoaiSanPham->save();
    return redirect()->route('ngdadmins.ngdloaisanpham');   
}
public function ngdEdit($id)
{
    $ngdLoaiSanPham= NGD_LOAI_SAN_PHAM::find($id);
    return view('NgdAdmins.ngdLoaiSanPham.ngdedit',['ngdLoaiSanPham'=>$ngdLoaiSanPham]);
}
//Post editsubmit
public function ngdEditSubmit(Request $request)
{
     //Validation data
     $validationData=$request->validate([
        'ngdMaLoai'=>'required|unique:ngd_loaisanpham',
        'ngdTenLoai'=>'required',
    ]);
    //ghi du lieu xuong db
    $ngdLoaiSanPham =  NGD_LOAI_SAN_PHAM::find($request->id);
    $ngdLoaiSanPham->ngdMaLoai=$request->ngdMaLoai;
    $ngdLoaiSanPham->ngdTenLoai->$request->ngdTenLoai;
    $ngdLoaiSanPham->ngdTrangThai->$request->ngdTrangThai;
    $ngdLoaiSanPham->save();
    return redirect()->route('ngdadmins.ngdloaisanpham');   
}
//Get delete
public function ngdDelete($id)
{
    $ngdLoaiSanPham= NGD_LOAI_SAN_PHAM::find($id);
    $ngdLoaiSanPham->delete();
    return redirect()->route('ngdadmins.ngdloaisanpham');   
}
}
