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
                Bài tập lớp {{ $lop->ten }}
                <div style="margin-left: 30%"><a onclick="showbaitap('tabdebai')" class="btn btn-sm btn-success">Giao bài</a></div>
            </div>
            <div class="card-body">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                    <div class="dataTable-container">
                        <table id="datatablesSimple" class="dataTable-table">
                            <thead>
                                <tr>
                                    <th data-sortable="" style="width: 2%;"><a href="#" class="dataTable-sorter">STT</a>
                                    </th>
                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Tên</a>
                                    </th>
                                    <th data-sortable="" style="width: 4%;"><a href="#" class="dataTable-sorter">Lượt
                                            làm</a></th>
                                    <th data-sortable="" style="width: 7%;"><a href="#" class="dataTable-sorter">Ngày
                                            giao</a></th>
                                    <th data-sortable="" style="width: 7%;"><a href="#" class="dataTable-sorter">Hạn nộp</a>
                                    </th>
                                    <th data-sortable="" style="width: 7%;"><a href="#" class="dataTable-sorter">Ngày giao
                                            đáp án</a></th>
                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Chi
                                            tiết</a></th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($dagiao as $item)
                                @php
                                    $ngaygiao = Carbon\Carbon::parse($item->ngaygiao)->format('H:m d/m/Y');
                                    $hannop = Carbon\Carbon::parse($item->hannop)->format('H:m d/m/Y');
                                    $giaodapan = Carbon\Carbon::parse($item->giaodapan)->format('H:m d/m/Y');
                                @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->ten }}</td>
                                        <td>{{ $item->luotlam }}</td>
                                        <td>{{ $ngaygiao}}</td>
                                        <td>{{ $hannop}}</td>
                                        <td>{{ $giaodapan}}</td>
                                        <td>
                                            <a href="{{URL::asset('giao-vien/bailam')}}/{{$item->id}}/lop/{{$lop->id}}" class="btn btn-sm btn-info">Xem</a>
                                            <a href="" class="btn btn-sm btn-success">Sửa</a>
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
@section('tab')
    <div id="tabdebai" style="position: fixed; right: 0px; top: 10%; max-width: 20%; min-width: 200px; display: none">

        <div class="card bg-info text-white mb-4">
            <form action="{{URL::asset('giao-vien/giaobaitap')}}/{{$lop->id}}" method="post">
                @csrf
                <div style="position: relative">
                    <div class="card-header">
                        Giao bài tập
                        <div onclick="hidebaitap('tabdebai')" style="position: absolute; top: 1%; right: 1%;">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            Chọn Đề:
                            <select name="debai" class="form-select form-select-sm" id="">
                                @foreach ($debais as $item)
                                    <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>
                    <div class="card-body">
                        <div>
                            Hạn cuối
                            <input name="deadline" type="datetime-local">
                        </div>
                        <div>
                            Ngày giao đáp án
                            <input name="pointcheck" type="datetime-local">
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-sm btn-success" value="Xong">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{URL::asset('public/js/myscripts.js')}}"></script>
@endsection
