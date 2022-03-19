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
    <div class="container-fluid px-4" style="padding: 1%">

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Đề bài mới
            </div>
            <form action="{{ URL::asset('giao-vien/postdebai') }}" method="POST">
                @csrf

                <div class="g-2" style="padding: 2%">
                    <div class="row">
                        <div class="col-md-3">
                            Chọn khối
                            <select class="form-select form-select-lg mb-3" name="khoi">
                                @foreach ($khois as $khoi)
                                    <option value="{{ $khoi->id }}">{{ $khoi->ten }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            Độ khó
                            <select name="dokho" class="form-select  form-select-lg mb-3">
                                <option value="1">Dễ</option>
                                <option value="2">Vừa</option>
                                <option value="3">Khó</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="ten" placeholder="Nhập tên">
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control" placeholder="Thời gian(phút)" name="thoigian" min="0">
                        </div>
                    </div>
                </div>
                <div style="padding-left: 3%">
                    <button type="submit" class="btn btn-sm btn-success">Chọn bài</button>
                </div>
                
            </form>
        </div>
    </div>
@endsection
