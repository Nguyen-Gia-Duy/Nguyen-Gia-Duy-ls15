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
        Schema::create('Ngd_CTHoaDon', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ngdHoaDonID')->references('id')->on('Ngd_HoaDon');
            $table->bigInteger('ngdSanPhamID')->references('id')->on('Ngd_SanPham');
            $table->integer('ngdSoLuongMua');
            $table->float('ngdDonGia');
            $table->float('ngdThanhTien');
            $table->tinyInteger('ngdTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ngd_CTHoaDon');
    }
};
