<?php
use App\Http\Controllers\NGD_QUAN_TRIController;
use App\Http\Controllers\NGD_LOAi_SAN_PHAMController;
use App\Http\Controllers\NGD_SAN_PHAMController;
use App\Http\Controllers\NgdLoginController;
use App\Http\Controllers\NGD_KHACH_HANGController;
use App\Http\Controllers\NGD_HOA_DONController;
use App\Http\Controllers\NGD_CT_HOA_DONController;

use Illuminate\Support\Facades\Route;   

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admins/ngd-login',[NGD_QUAN_TRIController::class,'ngdLogin'])->name('admins.ngdLogin');
Route::post('/admins/ngd-login',[NGD_QUAN_TRIController::class,'ngdLoginSubmit'])->name('admins.ngdLoginSubmit');
#admins-route
Route::get('/ngd-admins',function(){
    return view('ngdAdmins.index');
});
Route::get('/ngd-admins/ngd-loai-san-pham',[NGD_LOAi_SAN_PHAMController::class,'ngdlist'])->name('ngdadmins.ngdloaisanpham');
Route::get('/ngd-admins/ngd-loai-san-pham/ngdcreate',[NGD_LOAi_SAN_PHAMController::class,'ngdCreate'])->name('ngdadmins.ngdloaisanpham.ngdcreate');
Route::post('/ngd-admins/ngd-loai-san-pham/ngdcreate',[NGD_LOAi_SAN_PHAMController::class,'ngdCreateSubmit'])->name('ngdadmins.ngdloaisanpham.ngdcreatesubmit');
//edit
Route::get('/ngd-admins/ngd-loai-san-pham/ngdedit/{{id}}',[NGD_LOAi_SAN_PHAMController::class,'ngdEdit'])->name('ngdadmins.ngdloaisanpham.ngdedit');
Route::get('/ngd-admins/ngd-loai-san-pham/ngdedit',[NGD_LOAi_SAN_PHAMController::class,'ngdEditSubmit'])->name('ngdadmins.ngdloaisanpham.ngdeditSubmit');
//delete
Route::get('/ngd-admins/ngd-loai-san-pham/ngddelete/{{id}}',[NGD_LOAi_SAN_PHAMController::class,'ngdDelete'])->name('ngdadmins.ngdloaisanpham.ngddelete');
//sab pham
Route::get('/ngd-admins/ngd-san-pham',[NGD_SAN_PHAMController::class,'ngdlist'])->name('ngdadmins.ngdsanpham.ngdlist');
Route::get('/ngd-admins/ngd-san-pham/ngd-create',[NGD_SAN_PHAMController::class,'ngdCreate'])->name('ngdadmins.ngdsanpham.ngdcreate');
Route::post('/ngd-admins/ngd-san-pham/ngd-create',[NGD_SAN_PHAMController::class,'ngdCreateSubmit'])->name('ngdadmins.ngdsanpham.ngdcreatesubmit');
Route::get('/ngd-admins/ngd-san-pham/ngd-detail/{id}', [NGD_SAN_PHAMController::class, 'ngdDetail'])->name('vtdadmins.vtdsanpham.vtdDetail');
Route::get('/ngd-admins/ngd-san-pham/ngd-delete/{id}', [NGD_SAN_PHAMController::class, 'ngddelete'])->name('ngdadmin.ngdsanpham.ngddelete');
//login
Route::get('/ngd-login',[NgdLoginController::class,'ngdindex']);
Route::post('/ngd-login', [NgdLoginController::class, 'ngdloginSubmit'])->name('ngd-login.submit');

// khach hang--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/ngd-admins/ngd-khach-hang',[NGD_KHACH_HANGController::class,'ngdList'])->name('ngdadmins.ngdkhachhang');
//detail
Route::get('/ngd-admins/ngd-khach-hang/ngd-detail/{id}', [NGD_KHACH_HANGController::class, 'ngdDetail'])->name('ngdadmin.ngdkhachhang.ngdDetail');
//create
Route::get('/ngd-admins/ngd-khach-hang/vtd-create',[NGD_KHACH_HANGController::class,'ngdCreate'])->name('ngdadmin.ngdkhachhang.ngdcreate');
Route::post('/ngd-admins/ngd-khach-hang/vtd-create',[NGD_KHACH_HANGController::class,'ngdCreateSubmit'])->name('ngdadmin.ngdkhachhang.ngdCreateSubmit');
//edit
Route::get('/ngd-admins/ngd-khach-hang/ngd-edit/{id}', [NGD_KHACH_HANGController::class, 'ngdEdit'])->name('ngdadmin.ngdkhachhang.ngdedit');
Route::post('/ngd-admins/ngd-khach-hang/ngd-edit/{id}', [NGD_KHACH_HANGController::class, 'ngdEditSubmit'])->name('ngdadmin.ngdkhachhang.ngdEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/ngd-admins/ngd-khach-hang/ngd-delete/{id}', [NGD_KHACH_HANGController::class, 'ngdDelete'])->name('ngdadmin.ngdkhachhang.ngddelete');
//Hoa don------------------------------------------------
// list
Route::get('/ngd-admins/ngd-hoa-don',[NGD_HOA_DONController::class,'ngdList'])->name('ngdadmins.ngdhoadon');
//detail
Route::get('/ngd-admins/ngd-hoa-don/ngd-detail/{id}', [NGD_HOA_DONController::class, 'ngdDetail'])->name('ngdadmin.ngdhoadon.ngdDetail');
//create
Route::get('/ngd-admins/ngd-hoa-don/ngd-create',[NGD_HOA_DONController::class,'ngdCreate'])->name('ngdadmin.ngdhoadon.ngdcreate');
Route::post('/ngd-admins/ngd-hoa-don/ngd-create',[NGD_HOA_DONController::class,'ngdCreateSubmit'])->name('ngdadmin.ngdhoadon.ngdCreateSubmit');
//edit
Route::get('/ngd-admins/ngd-hoa-don/ngd-edit/{id}', [NGD_HOA_DONController::class, 'ngdEdit'])->name('ngdadmin.ngdhoadon.ngdedit');
Route::post('/ngd-admins/ngd-hoa-don/ngd-edit/{id}', [NGD_HOA_DONController::class, 'ngdEditSubmit'])->name('ngdadmin.ngdhoadon.ngdEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/ngd-admins/ngd-hoa-don/ngd-delete/{id}', [NGD_HOA_DONController::class, 'ngdDelete'])->name('ngdadmin.ngdhoadon.ngddelete');
// Chi Tiết Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/ngd-admins/ngd-ct-hoa-don',[NGD_CT_HOA_DONController::class,'ngdList'])->name('ngdadmins.ngdcthoadon');
//detail
Route::get('/ngd-admins/ngd-ct-hoa-don/ngd-detail/{id}', [NGD_CT_HOA_DONController::class, 'ngdDetail'])->name('ngdadmin.ngdcthoadon.ngdDetail');
//create
Route::get('/ngd-admins/ngd-ct-hoa-don/ngd-create',[NGD_CT_HOA_DONController::class,'ngdCreate'])->name('ngdadmin.ngdcthoadon.ngdcreate');
Route::post('/ngd-admins/ngd-ct-hoa-don/ngd-create',[NGD_CT_HOA_DONController::class,'ngdCreateSubmit'])->name('ngdadmin.ngdcthoadon.ngdCreateSubmit');
//edit
Route::get('/ngd-admins/ngd-ct-hoa-don/ngd-edit/{id}', [NGD_CT_HOA_DONController::class, 'ngdEdit'])->name('ngdadmin.ngdcthoadon.ngdedit');
Route::post('/ngd-admins/ngd-ct-hoa-don/ngd-edit/{id}', [NGD_CT_HOA_DONController::class, 'ngdEditSubmit'])->name('ngdadmin.ngdcthoadon.ngdEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/ngd-admins/ngd-ct-hoa-don/ngd-delete/{id}', [NGD_CT_HOA_DONController::class, 'NGdDelete'])->name('ngdadmin.ngdcthoadon.ngddelete');