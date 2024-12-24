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
        Schema::create('Ngd_HoaDon', function (Blueprint $table) {
            $table->id();
            $table->string('ngdMaHoaDon',255)->unique();
            $table->bigInteger('ngdKhachHang')->references('id')->on('Ngd_KhachHang');
            $table->date('ngdNgayHoaDon',);
            $table->string('ngdHoTenKhachHang',255);
            $table->string('ngdEmail',255);
            $table->string('ngdDienThoai',255);
            $table->string('ngdDiaChi',255);
            $table->float('ngdTongTriGia');
            $table->tinyInteger('ngdTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ngd_HoaDon');
    }
};
