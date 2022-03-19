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
            <div class="card-header">
                <svg class="svg-inline--fa fa-table fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64v-96h160v96zm0-160H64v-96h160v96zm224 160H288v-96h160v96zm0-160H288v-96h160v96z">
                    </path>
                </svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
                {{ $title }}
            </div>
            <form action="{{ URL::asset('giao-vien') }}/{{ $submit }}" style="padding: 2%" method="POST">
                @csrf
                <div class="row g-2">
                    <div class="col-md-2">
                        Khối
                        <select class="form-select" id="khoi" onchange="changekhoi()" name="khoi">
                            @foreach ($khois as $item)

                                @if ($k == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->ten }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        Chương
                        <select name="chuong" id="chuong" onchange="changechuong()" class="form-select">
                            @if (isset($flag))
                                @foreach ($chuongs as $item)
                                    <option @if ($flag->chuong == $item->id) selected @endif value="{{ $item->id }}"> {{ $item->ten }} </option>
                                @endforeach
                            @else
                                @foreach ($chuongs as $item)
                                    <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3">
                        Bài
                        <select class="form-select" name="theloai" id="theloai">
                            @if (isset($flag))
                                @foreach ($theloais as $item)
                                    <option @if ($flag->theloai == $item->id) selected @endif value="{{ $item->id }}">{{ $item->ten }}</option>
                                @endforeach
                            @else
                                @foreach ($theloais as $item)
                                    <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                    <div class="col-md-2">
                        Độ khó
                        <select name="dokho" class="form-select">
                            @if (isset($baitap))
                                <option @if ($baitap->dokho == 1) selected @endif value="1">Lý thuyết</option>
                                <option @if ($baitap->dokho == 2) selected @endif value="2">Dễ</option>
                                <option @if ($baitap->dokho == 3) selected @endif value="3">Vừa</option>
                                <option @if ($baitap->dokho == 4) selected @endif value="4">Khó</option>
                            @else
                                <option value="1">Lý thuyết</option>
                                <option value="2">Dễ</option>
                                <option value="3">Vừa</option>
                                <option value="4">Khó</option>
                            @endif

                        </select>
                    </div>
                </div>
                <hr />
                <div class="row g-2">
                    <div>
                        <b>Đề bài</b>
                        <textarea name="de" id="ckeditor" cols="15" rows="7">@if (isset($baitap)) {{$baitap->de}} @endif</textarea>
                    </div>
                    <hr />
                    <div class="col-md-6">
                        <div>
                            <input type="radio" @if (isset($baitap) && $baitap->Da == 1) checked @endif name="dapan" value="1"><b>Đáp án A</b>
                        </div>
                        <div>
                            <textarea name="DaA" id="ckeditor1" cols="30" rows="5">@if (isset($baitap)) {{$baitap->DaA}} @endif</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <input type="radio" @if (isset($baitap) && $baitap->Da == 2) checked @endif name="dapan" value="2"> <b>Đáp án B</b>
                        </div>
                        <div>
                            <textarea name="DaB" id="ckeditor2" cols="30" rows="5">@if (isset($baitap)) {{$baitap->DaB}} @endif</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <input type="radio" @if (isset($baitap) && $baitap->Da == 3) checked @endif name="dapan" value="3"> <b>Đáp án C</b>
                        </div>
                        <div>
                            <textarea name="DaC" id="ckeditor3" cols="30" rows="5">@if (isset($baitap)) {{$baitap->DaC}} @endif</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <input type="radio" @if (isset($baitap) && $baitap->Da == 4) checked @endif name="dapan" value="4"> <b>Đáp án D</b>
                        </div>
                        <div>
                            <textarea name="DaD" id="ckeditor4" cols="30" rows="5">@if (isset($baitap)) {{$baitap->DaD}} @endif</textarea>
                        </div>
                    </div>

                </div>
                <hr />
                <button type="submit" class="btn btn-sm btn-success">Xong</button>
            </form>
        </div>
    </div>

    <script>
        (function() {
            var mathElements = [
                'math', 'maction', 'maligngroup', 'malignmark', 'menclose', 'merror', 'mfenced',
                'mfrac', 'mglyph', 'mi', 'mlabeledtr', 'mlongdiv', 'mmultiscripts',
                'mn', 'mo', 'mover', 'mpadded', 'mphantom', 'mroot',
                'mrow', 'ms', 'mscarries', 'mscarry', 'msgroup', 'msline',
                'mspace', 'msqrt', 'msrow', 'mstack', 'mstyle', 'msub',
                'msup', 'msubsup', 'mtable', 'mtd', 'mtext', 'mtr',
                'munder', 'munderover', 'semantics', 'annotation', 'annotation-xml'
            ];

            CKEDITOR.plugins.addExternal('ckeditor_wiris',
                'https://ckeditor.com/docs/ckeditor4/4.16.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

            CKEDITOR.replace('ckeditor', {
                extraPlugins: 'ckeditor_wiris',
                // For now, MathType is incompatible with CKEditor file upload plugins.
                removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                height: 320,
                // Update the ACF configuration with MathML syntax.
                extraAllowedContent: mathElements.join(' ') +
                    '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
            });
            CKEDITOR.replace('ckeditor1', {
                extraPlugins: 'ckeditor_wiris',
                // For now, MathType is incompatible with CKEditor file upload plugins.
                removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                height: 320,
                // Update the ACF configuration with MathML syntax.
                extraAllowedContent: mathElements.join(' ') +
                    '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
            });
            CKEDITOR.replace('ckeditor2', {
                extraPlugins: 'ckeditor_wiris',
                // For now, MathType is incompatible with CKEditor file upload plugins.
                removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                height: 320,
                // Update the ACF configuration with MathML syntax.
                extraAllowedContent: mathElements.join(' ') +
                    '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
            });
            CKEDITOR.replace('ckeditor3', {
                extraPlugins: 'ckeditor_wiris',
                // For now, MathType is incompatible with CKEditor file upload plugins.
                removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                height: 320,
                // Update the ACF configuration with MathML syntax.
                extraAllowedContent: mathElements.join(' ') +
                    '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
            });
            CKEDITOR.replace('ckeditor4', {
                extraPlugins: 'ckeditor_wiris',
                // For now, MathType is incompatible with CKEditor file upload plugins.
                removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                height: 320,
                // Update the ACF configuration with MathML syntax.
                extraAllowedContent: mathElements.join(' ') +
                    '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
            });
        }());
    </script>
    <script>
        function changekhoi() {
            var id = document.getElementById('khoi').value;
            var u = "{{ URL::asset('giao-vien/loadchuong') }}/" + id;
            $.ajax({
                type: 'GET',
                url: u,
                success: function(data) {
                    if (data != 'false') {
                        $('#chuong').html(data);
                    } else alert('a');
                }
            });
            u = "{{ URL::asset('giao-vien/loadtheloai') }}/" + id;
            $.ajax({
                type: 'GET',
                url: u,
                success: function(data) {
                    if (data != 'false') {
                        $('#theloai').html(data);
                    } else alert('a');
                }
            });
            return false;
        }

        function changechuong() {
            var khoi = document.getElementById('khoi').value;
            var chuong = document.getElementById('chuong').value;
            u = "{{ URL::asset('giao-vien/loadtheloai') }}/" + khoi + "/" + chuong;
            $.ajax({
                type: 'GET',
                url: u,
                success: function(data) {
                    if (data != 'false') {
                        $('#theloai').html(data);
                    } else alert('a');
                }
            });
            return false;
        }
    </script>
@endsection
