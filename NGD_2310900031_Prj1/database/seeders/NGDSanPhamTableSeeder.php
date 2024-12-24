<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NGDSanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('Ngd_SanPham')->insert([
            'ngdMaSanPham'=>"VP01",
            'ngdTenSanPham'=>"Cay Phu Quy",
            'ngdHinhAnh'=>"images\duy_067.jpg",
            'ngdSoLuong'=>100,
            'ngdDonGia'=>100000,
            'ngdMaLoai'=>1,
            'ngdTrangThai'=>0
        ]);
        DB::table('Ngd_SanPham')->insert([
            'ngdMaSanPham'=>"VP02",
            'ngdTenSanPham'=>"Cay Dai Gia",
            'ngdHinhAnh'=>"images\duy_067.jpg",
            'ngdSoLuong'=>220,
            'ngdDonGia'=>500000,
            'ngdMaLoai'=>2,
            'ngdTrangThai'=>0
        ]);
        DB::table('Ngd_SanPham')->insert([
            'ngdMaSanPham'=>"VP04",
            'ngdTenSanPham'=>"Cay Yeu Quai",
            'ngdHinhAnh'=>"images\duy_067.jpg",
            'ngdSoLuong'=>500,
            'ngdDonGia'=>70000,
            'ngdMaLoai'=>3,
            'ngdTrangThai'=>0
        
    ]);
    DB::table('Ngd_SanPham')->insert([
        'ngdMaSanPham'=>"VP07",
        'ngdTenSanPham'=>"Cay Hanh Phuc",
        'ngdHinhAnh'=>"images\duy_067.jpg",
        'ngdSoLuong'=>700,
        'ngdDonGia'=>6000,
        'ngdMaLoai'=>5,
        'ngdTrangThai'=>0
    
]);
}
}
