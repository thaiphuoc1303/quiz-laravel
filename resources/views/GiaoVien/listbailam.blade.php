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
                <label for=""><i class="fas fa-book"></i></label>
                Bài tập 
            </div>
            <div class="card-body">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                    <div class="dataTable-container">
                        <table id="datatablesSimple" class="dataTable-table">
                            <thead>
                                <tr>
                                    <th data-sortable="" style="width: 2%;"><a href="#" class="dataTable-sorter">STT</a>
                                    </th>
                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Tên học sinh</a>
                                    </th>
                                    <th data-sortable="" style="width: 4%;"><a href="#" class="dataTable-sorter">Số câu đúng</a></th>
                                    <th data-sortable="" style="width: 7%;"><a href="#" class="dataTable-sorter">Thời gian làm</a></th>
                                    <th data-sortable="" style="width: 7%;"><a href="#" class="dataTable-sorter">Lượt làm</a></th>
                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Chi tiết</a></th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($bailams as $item)
                                @php
                                    $time1 = Carbon\Carbon::parse($item->thoigianlam);
                                    $time2 = Carbon\Carbon::parse($item->thoigiannop);
                                @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->ten }}</td>
                                        <td>{{ $item->diem}}</td>
                                        <td>{{$time1->diffInMinutes($time2)}} phút</td>
                                        <td>{{$item->luotlam}}</td>
                                        <td>
                                            <a href="{{URL::asset('giao-vien/bailam/chitiet')}}/{{$item->id}}"
                                                 class="btn btn-sm btn-outline-success">Chi tiết</a>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection