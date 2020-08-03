<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HERevival</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-VhBcF/php0Z/P5ZxlxaEx1GwqTQVIBu4G4giRWxTKOCjTxsPFETUDdVL5B6vYvOt" crossorigin="anonymous">

        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">

                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-flat btn-light rounded-left" href="#">
                            <i class="fas fa-user"></i> {{ auth()->user()->username }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-flat btn-light" href="#">
                            <i class="fas fa-envelope"></i> Inbox
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-flat btn-light" href="#">
                            <i class="fas fa-wrench"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-flat btn-light rounded-right" href="#">
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
                                <a href="{{ route('home') }}"
                                   class="nav-link{{ request()->routeIs('home') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>
                                        Task Manager
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-folder-open"></i>
                                    <p>
                                        Software
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('get.browser.index') }}"
                                   class="nav-link{{ request()->routeIs('get.browser.index') || request()->routeIs('get.browser.login') || request()->routeIs('get.browser.exploits') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-globe"></i>
                                    <p>
                                        Internet
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-sticky-note"></i>
                                    <p>
                                        Log file
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-desktop"></i>
                                    <p>
                                        Hardware
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-flask"></i>
                                    <p>
                                        University
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-wallet"></i>
                                    <p>
                                        Finances
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-terminal"></i>
                                    <p>
                                        Slaves
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-bullseye"></i>
                                    <p>
                                        Missions
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Clan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-bars"></i>
                                    <p>
                                        Rank
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-star"></i>
                                    <p>
                                        Hall of Fame
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
                            <div class="col-sm-6">
                                <h1>{{ $page_name }}</h1>
                            </div>
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
                <strong>HERevival</strong> - Page
                    took {{ number_format(microtime(true) - LARAVEL_START, 4 ) }} seconds to load</strong>
            </footer>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
