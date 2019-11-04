<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Whatever - HERevival</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
              rel="stylesheet">
        <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/other.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow navbar-expand-lg">
                <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">HERevival</a>
            <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> {{ auth()->guest() ? '' : auth()->user()->username }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-inbox"></i> Inbox</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-wrench"></i> Settings</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="post" class="form-inline">
                            @csrf
                            <button type="submit" class="nav-link" style="background-color: transparent;border: 0"><i class="fa fa-power-off"></i> Sign out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->route()->getName() !== "home" ?: 'active' }}" href="/home">
                                    <i class="fas fa-home"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-server"></i> Task Manager
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-folder-open"></i> Software
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->route()->getName() !== "get.browser.index" ?: 'active' }}" href="{{ route('get.browser.index') }}">
                                    <i class="fas fa-globe-europe"></i> Internet
                                    </a>
                                </li>
                            </ul>
                    </div>
                </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    @if (isset($page_name))
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
                            <h1 class="h2">{{ $page_name }}</h1>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group mr-2">
                                    <ul class="list-unstyled">
                                        <li>
                                            <h3 class="p-0 m-0">{{ auth()->user()->game_address }}</h3>
                                        </li>
                                        <li>
                                            <small class="p-0 m-0 float-left"><i class="fad fa-clock"></i> {{ date('Y-m-d H:i') }}</small>
                                            <small class="p-0 m-0 float-right"><i class="fad fa-users"></i> {{ rand() % 100 }}</small>
                                        </li>
                                        <li>
                                            <small class="p-0 m-0 float-left"><i class="fad fa-star"></i> 1,212,214 (#1)</small>
                                            <small class="p-0 m-0 float-right"><i class="fad fa-dollar-sign"></i> 15.000</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    @yield('content')
                </main>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/esm/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/b69e08f7a4.js" crossorigin="anonymous"></script>
    </body>
</html>
