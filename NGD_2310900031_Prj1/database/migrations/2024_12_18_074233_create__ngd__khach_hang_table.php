<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Ngd_KhachHang', function (Blueprint $table) {
            $table->id();
            $table->string('ngdMaKhachHang',255);
            $table->string('ngdHoTenKhachHang',255);
            $table->string('ngdEmail',255);
            $table->string('ngdMatKhau',255);
            $table->string('ngdDienThoai',255);
            $table->string('ngdDiaChi',255);
            $table->date('ngdNgayDangKi');
            $table->tinyInteger('ngdTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ngd_KhachHang');
    }
};
