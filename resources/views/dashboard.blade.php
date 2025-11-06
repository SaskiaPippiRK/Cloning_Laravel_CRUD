<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GDCrud_A_12300</title>
    <link
        rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GASXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen"
                    href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <img src=" {{ asset('img/AdminLTELogo.png') }}"
                alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">Event Gacor</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview" role="menu" data-accordion="false">
                    
                    <li class="nav-item">
                        <a href="{{ url('event') }}"
                            class="nav-link">
                            <i class="nav-icon fa-solid fa-calendar-days"></i>
                            <p> Event</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ url('ticket') }}"
                            class="nav-link">
                            <i class="nav-icon fa-solid fa-ticket"></i>
                            <p> Ticket</p>
                        </a>
                    </li>
                    
                </ul>
            </nav>
            </div>
        </aside>
    <div class="content-wrapper">
        @yield('content')
    </div>
    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline"> GDCrud_X_YYYYY
        </div>
        <strong>Copyright &copy; {{ date('Y') }} <a
            href="#">AdminLTE.io</a>. </strong> All rights reserved.
    </footer>
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>
</html>