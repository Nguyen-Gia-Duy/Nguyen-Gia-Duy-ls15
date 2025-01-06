<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NGD_HOA_DON extends Model
{
    use HasFactory;
    protected $table = 'ngd_hoadon';
    protected $primaryKey = 'id';
    public $incrementing = false; // Nếu vtdnhacc không phải là auto-increment
    public $timestamps = true; // Đảm bảo là 'true' nếu bạn sử dụng timestamps
}