@extends('Master')
@section('title')
    Bài tập
@endsection
@section('sidebar')
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="{{ URL::asset('hoc-sinh/profile') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>customer-support</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(1.000000, 0.000000)">
                                            <path class="color-background opacity-6"
                                                d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Thông tin học sinh</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ URL::asset('hoc-sinh/baitap') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>document</title>
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                    fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="document" transform="translate(154.000000, 300.000000)">
                                            <path class="color-background"
                                                d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                                id="Path" opacity="0.603585379">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"
                                                id="Shape"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </div>
                    <span class="nav-link-text ms-1">Bài tập</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Tài khoản</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ URL::asset('logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-link-text ms-1">Đăng xuất</span>
                </a>
            </li>

        </ul>
    </div>
@endsection

@section('content')
    <div class="card-header">
        <p class="h5">Đề bài: {{ $debai->ten }}</p>
        <p class="h6">Thời gian: {{ $debai->thoigian != 0 ? $debai->thoigian : '' }} phút</p>
    </div>
    <div class="card">
        @php
            $i = 1;
        @endphp
        <form id="form-kq" name="form" action="" method="post">
            @csrf
            @foreach ($baitaps as $item)
                <div class="card cardbaitap">
                    <div>
                        <h6>Câu {{ $i }}:</h6> {!! $item->de !!}
                    </div>
                    <div class="row ">
                        <input type="radio" style="display: none" name="{{ $i }}" value="0" checked>
                        <div class="col-md-6 form-check mb-3">
                            <input type="radio" name="{{ $i }}"
                                onchange="changeda('{{ URL::asset('hoc-sinh/changecheck') }}/{{ $id }}')"
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
                            <input type="radio" name="{{ $i }}"
                                onchange="changeda('{{ URL::asset('hoc-sinh/changecheck') }}/{{ $id }}')"
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
                            <input type="radio" name="{{ $i }}"
                                onchange="changeda('{{ URL::asset('hoc-sinh/changecheck') }}/{{ $id }}')"
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
                            <input type="radio" name="{{ $i }}"
                                onchange="changeda('{{ URL::asset('hoc-sinh/changecheck') }}/{{ $id }}')"
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
                </div>
                @php
                    $i++;
                @endphp
            @endforeach

        </form>
        <form action="{{ URL::asset('hoc-sinh/submitbaitap') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="text-center">
                <button type="submit" class="btn btn-sm bg-gradient-success">Hoàn thành</button>
            </div>
        </form>
    </div>
    <script src="{{ URL::asset('public/js/myscripts.js') }}"></script>
@endsection
@section('name-student')
    {{ $hocsinh->ten }}
@endsection
@section('alert')
    <div
        style="position: fixed; top: 20%; right: 0px; min-width: 100px; max-width: 20%; background-color: rgba(255, 255, 0, 0.295)">
        <h5 id="remaining"></h5>
    </div>

    <script type="text/javascript">
        var m = {{ $remaining }} - 1;
        var s = 59;
        var demnguoc = setInterval(function() {
                if (s < 0) {
                    s = 59;
                    m--;
                    if (m < 0) {
                        clearInterval(demnguoc);
                        $('#remaining').html("Hết giờ!");
                    } else {
                        $('#remaining').html(m + " : " + s);
                        s--;
                    }
                } else {
                    $('#remaining').html(m + " : " + s);
                    s--;
                }
            },
            1000);
        
    </script>
@endsection
