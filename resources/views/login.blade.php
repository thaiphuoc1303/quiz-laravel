<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
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
                <div class="text-center">
                    <h5>Đăng nhập</h5>
                </div>

            </div>

            <div class="card-body pb-4">
                <div class="tab-content">
                    <div id="pills-login">
                        <form method="POST" action="{{ URL::asset('postlogin') }}">
                            @csrf
                            <label>Email</label>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <label>Password</label>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    aria-label="Password" aria-describedby="password-addon">
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="yes" name="rememberMe">
                                <label class="form-check-label" for="rememberMe">Lưu đăng nhập</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body pb-4 text-center">
                <a class="btn btn-sm bg-gradient-primary" href="{{URL::asset('registered')}}">Đăng ký</a>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ URL::asset('public/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/core/bootstrap.min.js') }}"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
</body>

</html>
