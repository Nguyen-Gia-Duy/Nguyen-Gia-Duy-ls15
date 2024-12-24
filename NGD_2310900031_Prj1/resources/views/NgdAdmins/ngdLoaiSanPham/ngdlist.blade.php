@extends('layouts.admins.master')
@section('title','Them moi loai san pham')
@section('content-body')
        <div class="container border">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex w-100 justify-content-between">
                <h1>Danh sach loai san pham</h1>
                <a href="{{route('ngdadmins.ngdloaisanpham.ngdcreate')}}" class="btn btn-success">Them moi</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ma loai</th>
                        <th>Ten loai</th>
                        <th>Trang thai</th>
                        <th>Chuc nang</th>
                    </tr>

                </thead>
                <tbody>
                    @forelse ($ngdLoaiSanPhams as $item)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{$item->ngdMaLoai}}</td>
                        <td>{{$item->ngdTenLoai}}</td>
                        <td>{{$item->ngdTrangThai}}</td>
                        <td>
                            view/
                            <a href="/ngd-admins/ngd-loai-san-pham/ngdedit/{{$item->id}}">Edit</a>
                            /delete
                            <a href="/ngd-admins/ngd-loai-san-pham/ngddelete/{{$item->id}}"
                                onclick="return confirm('Ban co chac chan xoa khong?')">Delete</a>

                        </td>
                    </tr>

                        
                    @empty
                    <tr>
                        <th colspan="5">Chua co thong tin loai san pham</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        </div>
        
@endsection
