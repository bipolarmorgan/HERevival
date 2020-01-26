<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 3 | Blank Page</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-flat btn-dark text-white" href="#">
                            <i class="fas fa-user"></i> {{ auth()->user()->username }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-flat btn-dark text-white" href="#">
                            <i class="fas fa-envelope"></i> Inbox
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-flat btn-dark text-white" href="#">
                            <i class="fas fa-wrench"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-flat btn-dark text-white" href="#">
                            <i class="fas fa-power-off"></i> Logout
                        </a>
                    </li>
                </ul>
            </nav>

            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="#" class="brand-link text-center">
                    <span class="brand-text font-weight-light">HERevival</span>
                </a>

                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-1">
{{--                            <div class="col-sm-6">--}}
{{--                                <h1>Blank Page</h1>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <ol class="breadcrumb float-sm-right">--}}
{{--                                    <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                                    <li class="breadcrumb-item active">Blank Page</li>--}}
{{--                                </ol>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </section>

                <section class="content">
                    @yield('content')
                </section>
            </div>

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 1.0.0
                </div>
                <strong>&copy; {{ \Carbon\Carbon::now()->year }} - HERevival</strong>
            </footer>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
