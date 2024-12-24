<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NGDLoaiSanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('Ngd_LoaiSanPham')->insert([
            'ngdMaLoai'=>"L04",
            'ngdTenLoai'=>"cay canh",
            'ngdTrangThai'=>0
        ]);
        DB::table('Ngd_LoaiSanPham')->insert([
            'ngdMaLoai'=>"L02",
            'ngdTenLoai'=>"xe may",
            'ngdTrangThai'=>1
        ]);
        DB::table('Ngd_LoaiSanPham')->insert([
            'ngdMaLoai'=>"L03",
            'ngdTenLoai'=>"oto",
            'ngdTrangThai'=>0
        ]);
    }
}
