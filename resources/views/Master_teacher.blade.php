<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="" />
    <meta name="description" content="Website làm bài tập online" />
    <meta http-equiv="content-language" content="vi" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('public/img/logo.png')}}">
    <link rel="icon" type="image/png" href="{{URL::asset('public/img/logo.png')}}">
    <title>Dashboard - SB Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ URL::asset('./public/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('./public/css/mystyles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        referrerpolicy="no-referrer" />

    <script type="text/javascript" src="{{ URL::asset('./public/js/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ URL::asset('./public/js/ckeditor/ckeditor.js') }}"></script>
    {{-- <script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script> --}}
    <script>
        CKFinder.config({
            connectorPath: '/ckfinder/connector'
        });
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Học Toán</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>


    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @yield('sidebar')
        </div>


        <div id="layoutSidenav_content">
            <main>
                @yield('content')
                @yield('tab')
            </main>
            @yield('footer')
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ URL::asset('./public/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('./public/js/datatables-simple-demo.js') }}"></script>
</body>

</html>
