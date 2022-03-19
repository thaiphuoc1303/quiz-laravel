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
                        <a class="nav-link" href="{{ URL::asset('logout') }}">Đăng xuất</a>
                    </nav>
                </div>

            </div>
        </div>
    </nav>
@endsection
@section('content')
    <div class="container-fluid px-4">
        <h1></h1>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header" style="display: flex;">
                    <i class="fas fa-table me-1"></i>
                    Danh sách bài tập
                </div>
                <div class="card-body">
                    <form action="{{ URL::asset('giao-vien/postlocbaitap') }}/{{ $id }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                Khối
                                <select name="khoi" id="khoi"
                                    onchange="onchangekhoi('{{ URL::asset('giao-vien/ajaxlockhoi') }}/')"
                                    class="form-select">
                                    <option value="">--</option>
                                    @foreach ($khois as $item)
                                        <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                Đại số/Hình
                                <select name="dai" id="dai"
                                    onchange="onchangekhoi('{{ URL::asset('giao-vien/ajaxlockhoi') }}/')"
                                    class="form-select">
                                    <option value="">--</option>
                                    <option value="1">Đại số</option>
                                    <option value="0">Hình học</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                Chương
                                <select name="chuong" id="chuong"
                                    onchange="onchangechuong('{{ URL::asset('giao-vien/ajaxlocchuong') }}/', this)"
                                    class="form-select">
                                    <option value="">--</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                Bài
                                <select name="theloai" id="theloai" class="form-select">
                                    <option value="">--</option>

                                </select>
                            </div>
                            <div class="col-md-1">
                                <label for=""></label>
                                <div>
                                    <button type="submit" class="btn  btn-success">Lọc</button>
                                </div>

                            </div>
                        </div>

                    </form>

                    <hr>
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-container">
                            <table id="datatablesSimple" class="dataTable-table">
                                <thead>
                                    <tr>
                                        <th data-sortable="" style="width: 1%;"><a href="#" class="dataTable-sorter"></a>
                                        </th>
                                        <th data-sortable="" style="width: 2%;"><a href="#" class="dataTable-sorter">STT</a>
                                        </th>
                                        <th data-sortable="" style="width: 40%;"><a href="#" class="dataTable-sorter">Đề</a>
                                        </th>
                                        <th data-sortable="" style="width: 10%;"><a href="#"
                                                class="dataTable-sorter">Level</a></th>
                                        <th data-sortable="" style="width: 10%;"><a href="#"
                                                class="dataTable-sorter">Chương</a></th>
                                        <th data-sortable="" style="width: 10%;"><a href="#"
                                                class="dataTable-sorter">Khối</a></th>
                                        <th data-sortable="" style="width: 10%;"><a href="#"
                                                class="dataTable-sorter"></a></th>
                                        <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Hành
                                                động</a></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($baitaps as $item)
                                        <tr>
                                            <td><input type="checkbox"
                                                    onchange="changeitem(this, '{{ URL::asset('giao-vien') }}', {{ $id }})"
                                                    value="{{ $item->id }}" {{ $item->chon }} name="demoi"></td>
                                            <td>{{ $i }}</td>
                                            <td>{!! $item->de !!}</td>
                                            <td>{{ $item->dokho }}</td>
                                            <td>{{ $item->tenchuong }}</td>
                                            <td>{{ $item->tenkhoi }}</td>
                                            <td><button class="btn btn-sm btn-info"
                                                    onclick="showbaitap('removeshow{{ $item->id }}')">Chi tiết</button>
                                            </td>
                                            <td>
                                                <a href="{{ URL::asset('giao-vien/suabaitap') }}/{{ $item->id }}"
                                                    class="btn btn-sm btn-success">Sửa</a>
                                                <a href="" onclick="ConfirmDialog({{ $item->id }})"
                                                    class="btn btn-sm btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $baitaps->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function ConfirmDialog(id) {

            var result = confirm("Xóa bài tập này?");

            if (result) {
                window.location.href = "{{ URL::asset('giao-vien/xoabaitap') }}/" + id;
                alert('Đã xóa');
            }
        }
    </script>
@endsection
@section('tab')
    <div id="tabdebai" style="position: fixed; right: 0px; top: 10%; max-width: 20%; min-width: 100px;">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Số câu đã chọn: {{ $count }}</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ URL::asset('giao-vien/debai/chitiet') }}/{{ $id }}"
                    class="small text-white stretched-link">Chi tiết</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <div id="showbaitap" class="container"
        style="position: fixed; bottom: 0px; background-color: rgba(245, 245, 184, 0.712)">
        @foreach ($baitaps as $baitap)
            <div style="display: none;" id="removeshow{{ $baitap->id }}">
                <div style="right:20px; position: fixed">
                    <button onclick="hidebaitap('removeshow{{ $baitap->id }}')">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <span><b>ID:{{ $baitap->id }}</b></span>
                <div class="card-header">
                    <div class="row">{!! $baitap->de !!}</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card col-md-6 @if ($baitap->Da == 1) bg-success @endif">
                            <span><b>A.</b></span>
                            {!! $baitap->DaA !!}
                        </div>
                        <div class="card col-md-6 @if ($baitap->Da == 2) bg-success @endif">
                            <span><b>B.</b></span>
                            {!! $baitap->DaB !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="card col-md-6 @if ($baitap->Da == 3) bg-success @endif">
                            <span><b>C.</b></span>
                            {!! $baitap->DaC !!}
                        </div>
                        <div class="card col-md-6 @if ($baitap->Da == 4) bg-success @endif">
                            <span><b>D.</b></span>
                            {!! $baitap->DaD !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script src="{{ URL::asset('./public/js/myscripts.js') }}"></script>
@endsection
