@extends('Master_teacher')
@section('sidebar')
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ URL::asset('giao-vien/lops') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Trang chủ
                </a>
                <div class="sb-sidenav-menu-heading">Bài tập</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseKhoi"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Khối
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseKhoi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ URL::asset('giao-vien/theloai/1') }}">Khối 10</a>
                        <a class="nav-link" href="{{ URL::asset('giao-vien/theloai/2') }}">Khối 11</a>
                        <a class="nav-link" href="{{ URL::asset('giao-vien/theloai/3') }}">Khối 12</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Đề bài
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ URL::asset('giao-vien/danhsachde/1') }}">Khối 10</a>
                        <a class="nav-link" href="{{ URL::asset('giao-vien/danhsachde/2') }}">Khối 11</a>
                        <a class="nav-link" href="{{ URL::asset('giao-vien/danhsachde/3') }}">Khối 12</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAcc"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Tài khoản
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAcc" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{URL::asset('logout')}}">Đăng xuất</a>
                    </nav>
                </div>

            </div>
        </div>
    </nav>
@endsection
@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header" style="display: flex;">
                <svg class="svg-inline--fa fa-table fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64v-96h160v96zm0-160H64v-96h160v96zm224 160H288v-96h160v96zm0-160H288v-96h160v96z">
                    </path>
                </svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
                Sửa học sinh
            </div>
            <div class="card-body">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                    <div class="dataTable-container">
                        <form id= "formhs" method="POST" action="{{URL::asset('giao-vien/postsuahocsinh')}}" class="row g-3">
                            @csrf
                            <input type="text" name="id" style="display: none" value="{{$hocsinh->id}}" >
                            <div class="col-md-4">
                                <label for="inputEmail4" class="form-label">Họ tên</label>
                                <input type="text" class="form-control" name="ten" placeholder="Họ tên" value="{{$hocsinh->ten}}">
                            </div>
                            <div class="col-md-4">
                                <label for="inputPassword4" class="form-label">Năm sinh</label>
                                <input type="number" class="form-control" name="namsinh" value="{{$hocsinh->namsinh}}">
                            </div>
                            <div class="col-md-4">
                                <label for="inputAddress" class="form-label">Trường</label>
                                <input type="text" class="form-control" name="truong" placeholder="Trường"  value="{{$hocsinh->truong}}">
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{$hocsinh->email}}">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" name="sodienthoai" placeholder="Số điện thoại" value="{{$hocsinh->sodienthoai}}">
                            </div>
                            <div class="col-md-2">
                                <label for="inputState" class="form-label">Lớp</label>
                                <select name="lop" class="form-select">
                                    @foreach ($lops as $item)
                                        <option 
                                        @if ($item->id == $hocsinh->lop)
                                            selected 
                                        @endif 
                                        value="{{ $item->id }}">{{ $item->ten }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Xong</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#formhs").validate({
                
                rules: {
                    ten: "required",
                    namsinh: "required",
                    truong: "required",
                    email: "required",
                    sodienthoai: "required",
                    lop: "required"
                    
                },
                messages: {
                    ten: "Bắt buộc nhập Họ tên",
                    namsinh: "Bắt buộc nhập Năm sinh",
                    truong: "Bắt buộc nhập Trường",
                    email: "Bắt buộc nhập email",
                    sodienthoai: "Bắt buộc nhập số điện thoại",
                    lop: "Bắt buộc chọn lớp"
                }
            });
        });
    </script>
@endsection
