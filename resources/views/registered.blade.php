<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link id="pagestyle" href="{{ URL::asset('public/assets/css/soft-ui-dashboard.css?v=1.0.3') }}"
        rel="stylesheet" />
    <style>
        body {
            background: url('{{URL::asset('public/img/background1.jpg')}}') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .card {
            width: 50%;
            min-width: 400px;
        }

    </style>
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="card mx-auto border-0">
            <div class="nav-wrapper position-relative end-0">
                <div class="text-center"><h5>Đăng ký</h5></div>
                
            </div>

            <div class="card-body pb-4">
                <div class="tab-content">
                    <div>
                        <form action="{{ URL::asset('postregistered') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="ten" class="form-control" placeholder="Họ Tên">
                                @if ($errors->has('ten'))
                                    {{$errors->first('ten')}}
                                @endif
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                @if ($errors->has('email'))
                                    {{$errors->first('email')}}
                                @endif
                            </div>
                            <div class="mb-3">
                                <input type="text" name="sodienthoai" class="form-control" placeholder="Số điện thoại">
                                @if ($errors->has('sodienthoai'))
                                    {{$errors->first('sodienthoai')}}
                                @endif
                            </div>
                            <div class="mb-3">
                                <input type="number" name="namsinh" class="form-control" min="1900" max="2500"
                                    placeholder="Năm sinh">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="truong" class="form-control" placeholder="Trường">
                            </div>
                            <div class="mb-3">
                                <select class="form-control" name="lop">
                                  <option value="">---</option>
                                  @foreach ($lops as $item)
                                    <option value="{{$item->id}}">{{$item->ten}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                @if ($errors->has('password'))
                                    {{$errors->first('password')}}
                                @endif
                            </div>
                            <div class="form-check form-check-info text-left">
                                
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-success">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--   Core JS Files   -->
    <script src="{{ URL::asset('public/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/plugins/chartjs.min.js') }}"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ URL::asset('public/assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
</body>

</html>

