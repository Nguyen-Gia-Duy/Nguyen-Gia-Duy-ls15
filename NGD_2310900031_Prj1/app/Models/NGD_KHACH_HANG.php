<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Thêm dòng này
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class NGD_KHACH_HANG extends Authenticatable // Kế thừa từ Authenticatable
{
    use HasFactory;

    protected $table = 'ngd_khachhang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ngdMaKhachHang', 'ngdHoTenKhachHang', 'ngdEmail', 'ngdMatKhau', 
        'ngdDienThoai', 'ngdDiaChi', 'ngdNgayDangKy', 'ngdTrangThai'
    ];

    // Nếu id không phải là auto-increment, set giá trị này thành false
    public $incrementing = false; 

    // Nếu không sử dụng timestamps trong bảng
    public $timestamps = true; 

    // Các trường ngày tháng sẽ tự động chuyển thành đối tượng Carbon
    protected $dates = ['ngdNgayDangKy'];

    // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
    public function setngdMatKhauAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['ngdMatKhau'] = Hash::make($value);
        }
    }
}