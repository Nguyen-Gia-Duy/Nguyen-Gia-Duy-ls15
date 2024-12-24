<?php
use App\Http\Controllers\NGD_QUAN_TRIController;
use App\Http\Controllers\NGD_LOAi_SAN_PHAMController;
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

