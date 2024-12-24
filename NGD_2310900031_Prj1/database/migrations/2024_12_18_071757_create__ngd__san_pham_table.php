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
        Schema::create('Ngd_SanPham', function (Blueprint $table) {
            $table->id();
            $table->string('ngdMaSanPham',255);
            $table->string('ngdTenSanPham',255);
            $table->string('ngdHinhAnh',255);
            $table->integer('ngdSoLuong');
            $table->float('ngdDonGia');
            $table->biginteger('ngdMaLoai')->references('id')->on('Ngd_LoaiSanPham');
            $table->tinyinteger('ngdTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ngd_SanPham');
    }
};
