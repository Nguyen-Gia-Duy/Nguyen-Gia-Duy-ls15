<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NGDQuanTriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $ngdMatKhau=md5("12345@");
        DB::table('Ngd_QuanTri')->insert([
            'ngdTaiKhoan'=>"Giaduy@gmail.com",
            'ngdMatKhau'=>$ngdMatKhau,
            'ngdTrangThai'=>0,
        ]);
        DB::table('Ngd_QuanTri')->insert([
            'ngdTaiKhoan'=>"0987653293",
            'ngdMatKhau'=>$ngdMatKhau,
            'ngdTrangThai'=>0,
        ]);
    }
}
