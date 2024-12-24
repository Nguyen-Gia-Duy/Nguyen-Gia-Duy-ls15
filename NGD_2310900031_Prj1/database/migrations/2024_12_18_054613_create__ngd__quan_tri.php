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
        Schema::create('Ngd_QuanTri', function (Blueprint $table) {
            $table->id();
            $table->string('ngdTaiKhoan',255)->unique();
            $table->string('ngdMatKhau',255);
            $table->tinyInteger('ngdTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ngd_QuanTri');
    }
};
