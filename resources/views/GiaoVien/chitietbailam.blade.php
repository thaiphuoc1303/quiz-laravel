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
                <div class="collapse" id="collapseKhoi" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
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
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
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
                <div class="collapse" id="collapseAcc" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ URL::asset('logout') }}">Đăng xuất</a>
                    </nav>
                </div>

            </div>
        </div>
    </nav>
@endsection
@section('content')
    <div class="container-fluid px-4">

        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <p class="h5">Tên học sinh: {{ $hocsinh->ten }}</p>
                        <p class="h6">Kết quả: {{ isset($bailam) ? $bailam->diem : 'Chưa làm' }}
                            {{ isset($bailam) ? '/' : '' }} {{ isset($bailam) ? sizeof($checked) : '' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="h5">Đề bài: {{ $debai->ten }}</p>
                        <p class="h6">Thời gian: {{ $debai->thoigian != 0 ? $debai->thoigian : '' }} phút</p>
                    </div>
                </div>
            </div>
            @php
                $i = 1;
            @endphp
            @foreach ($baitaps as $item)
                <div class="card cardbaitap">
                    <div>
                        <h6>Câu {{ $i }}:</h6> {!! $item->de !!}
                    </div>
                    <div class="row ">
                        <div class="col-md-6 form-check mb-3">
                            <input type="radio" name="{{ $i }}" disabled
                                {{ isset($checked[$i - 1]) && $checked[$i - 1] == 1 ? 'checked' : '' }} value="1"
                                class="form-check-input idcheck">
                            <label for="" class="custom-control-label">
                                <h6>A.</h6>
                            </label>
                            <label for="" class="custom-control-label">
                                {!! $item->DaA !!}
                            </label>
                        </div>
                        <div class="col-md-6 form-check mb-3">
                            <input type="radio" name="{{ $i }}" disabled
                                {{ isset($checked[$i - 1]) && $checked[$i - 1] == 2 ? 'checked' : '' }} value="2"
                                class="form-check-input idcheck">
                            <label for="" class="custom-control-label">
                                <h6>B.</h6>
                            </label>
                            <label for="" class="custom-control-label">
                                {!! $item->DaB !!}
                            </label>
                        </div>
                        <div class="col-md-6 form-check mb-3">
                            <input type="radio" name="{{ $i }}" disabled
                                {{ isset($checked[$i - 1]) && $checked[$i - 1] == 3 ? 'checked' : '' }} value="3"
                                class="form-check-input idcheck">
                            <label for="" class="custom-control-label">
                                <h6>C.</h6>
                            </label>
                            <label for="" class="custom-control-label">
                                {!! $item->DaB !!}
                            </label>
                        </div>
                        <div class="col-md-6 form-check mb-3">
                            <input type="radio" name="{{ $i }}" disabled
                                {{ isset($checked[$i - 1]) && $checked[$i - 1] == 4 ? 'checked' : '' }} value="4"
                                class="form-check-input idcheck">
                            <label for="" class="custom-control-label">
                                <h6>D.</h6>
                            </label>
                            <label for="" class="custom-control-label">
                                {!! $item->DaD !!}
                            </label>
                        </div>
                    </div>
                    <div><small
                            style="background-color: {{ isset($checked[$i - 1]) && $item->Da == $checked[$i - 1] ? '#0ccb1b7a' : '#cb0c0c7a' }} ">Đáp
                            án {{ $item->Da == 1 ? 'A' : '' }}
                            {{ $item->Da == 2 ? 'B' : '' }}{{ $item->Da == 3 ? 'C' : '' }}{{ $item->Da == 4 ? 'D' : '' }}</small>
                    </div>
                </div>
                @php
                    $i++;
                @endphp
            @endforeach
        </div>
    </div>
@endsection
