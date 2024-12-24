@extends('layouts.admins.master')
@section('title','Danh sach loai san pham')
@section('content-body')
    <div class="container border">
          
        </div>
        <div class="row">
            <div class="col">
                <form action="{{route('ngdadmins.ngdloaisanpham.ngdcreatesubmit')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2>Them moi loai san pham</h2>
                        </div>
                         <div class="card-body container-fluid">
                            <div class="mb-3 row">
                                <label for="ngdMaLoai" class="col-sm-2 col-form-label">Ma Loai</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" 
                                  value="{{old('ngdMaLoai')}}"
                                  id="ngdMaLoai"
                                  name="ngdMaLoai"/>
                                  @error('ngdMaLoai')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="ngdTenLoai " class="col-sm-2 col-form-label">Ten  Loai</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" 
                                  value="{{old('ngdTenLoai')}}"
                                  id="ngdTenLoai"
                                  name="ngdTenLoai"/>
                                  @error('ngdTenLoai')
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="ngdTrangThai" class="col-sm-2 col-form-label">Trang Thai </label>
                                <div class="col-sm-10">
                                  <input type="radio"  id="ngdTranngThai1" name="ngdTrangThai" value="1"
                                  checked />
                                  <label for="ngdTrangThai">hien thi</label>
                                  &nbsp;
                                  <input type="radio" id="ngdTrangThai0" name="ngdTrangThai" value="0"/>
                                  <label for="ngdTrangThai0">Khoa</label>
                                </div>
                              </div>
                         </div>
                    
                    
                         <div class="card-footer">
                            <button class="btn btn-success">Ghi lai</button>
                            <a href="{{route('ngdadmins.ngdloaisanpham')}}"class="btn btn-secondary">Quay lai</a>
                         </div>
                    </div>
                </form>               
            </div>
        </div>
     </div>
        
@endsection
