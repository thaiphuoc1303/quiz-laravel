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
        <h1>Khối {{$khoi->ten}}</h1>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header" style="display: flex;">
                    <svg class="svg-inline--fa fa-table fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64v-96h160v96zm0-160H64v-96h160v96zm224 160H288v-96h160v96zm0-160H288v-96h160v96z">
                        </path>
                    </svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
                    Bài
                    <div style="margin-left: 30%"><a href="{{URL::asset('giao-vien/themtheloai')}}/{{$khoi->id}}" class="btn btn-sm btn-success">Thêm bài</a></div>
                </div>
                <div class="card-body">
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-container">
                            <table id="datatablesSimple" class="dataTable-table">
                                <thead>
                                    <tr>
                                        <th data-sortable="" style="width: 3%;"><a href="#" class="dataTable-sorter">STT</a></th>
                                        <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Tên</a></th>
                                        <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Khối</a></th>
                                        <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Chương</a></th>
                                        <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter"></a></th>
                                        <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Hành động</a></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($theloais as $item)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$item->ten}}</td>
                                            <td>{{$item->tenkhoi}}</td>
                                            <td>{{$item->tenchuong}}</td>
                                            <td><a href="{{URL::asset('giao-vien/danhsachbaitap/theloai')}}/{{$item->id}}" class="btn btn-sm btn-info">Bài tập</a></td>
                                            <td>
                                                <a href="{{ URL::asset('giao-vien/suatheloai') }}/{{$item->id}}" class="btn btn-sm btn-success">Sửa</a>
                                                <a href="" onclick="ConfirmDialog({{$item->id}})" class="btn btn-sm btn-danger">Xóa</a>
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
            <div class="card mb-4 col-md-8">
                <div class="card-header" style="display: flex;">
                    <svg class="svg-inline--fa fa-table fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64v-96h160v96zm0-160H64v-96h160v96zm224 160H288v-96h160v96zm0-160H288v-96h160v96z">
                        </path>
                    </svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
                    Chương
                    <div style="margin-left: 30%"><a href="{{URL::asset('giao-vien/themchuong')}}/{{$khoi->id}}" class="btn btn-sm btn-success">Thêm chương</a></div>
                </div>
                <div class="card-body">
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-container">
                            <table id="datatablesSimple" class="dataTable-table">
                                <thead>
                                    <tr>
                                        <th data-sortable="" style="width: 3%;"><a href="#" class="dataTable-sorter">STT</a></th>
                                        <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Chương</a></th>
                                        <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Kì</a></th>
                                        <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter"></a></th>
                                        <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Hành động</a></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($chuongs as $item)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$item->ten}}</td>
                                            <td>{{$item->ki}}</td>
                                            <td><a href="{{URL::asset('giao-vien/danhsachbaitap/chuong')}}/{{$item->id}}" class="btn btn-sm btn-info">Bài tập</a></td>
                                            <td>
                                                <a href="{{ URL::asset('giao-vien/suatheloai') }}/{{$item->id}}" class="btn btn-sm btn-success">Sửa</a>
                                                <a href="" onclick="ConfirmDialog({{$item->id}})" class="btn btn-sm btn-danger">Xóa</a>
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
    </div>
    <script type="text/javascript">
 
        function ConfirmDialog(id)  {

             var result = confirm("Xóa thể loại này?\nMọi bài tập của này đều bị xóa");

             if(result)  {
                window.location.href="{{ URL::asset('giao-vien/xoatheloai') }}/"+id;
                alert('Đã xóa');
             } 
        }
     </script>
@endsection
