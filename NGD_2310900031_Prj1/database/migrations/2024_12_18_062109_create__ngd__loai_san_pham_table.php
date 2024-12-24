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
        Schema::create('Ngd_LoaiSanPham', function (Blueprint $table) {
            $table->id();
            $table->string('ngdMaLoai')->unique();
            $table->string('ngdTenLoai',255);
            $table->tinyInteger('ngdTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ngd_LoaiSanPham');
    }
};
