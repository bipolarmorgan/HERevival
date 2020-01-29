@extends('layouts.app', ['page_name' => 'Browser'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger mb-3" role="alert">
                        <ul class="list-unstyled m-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card mb-3">
                    <div class="card-body">
                        <form method="post" action="{{ route('post.browser.browse') }}">
                            @csrf
                            <input class="form-control" name="ip" placeholder="{{ $server->ip_address }}">
                        </form>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <ul class="nav">
                            <li class="nav-item col px-0">
                                <a class="nav-link btn btn-flat rounded-left btn-secondary{{ request()->routeIs('get.browser.index') ? ' active' : '' }}"
                                   href="{{ route('get.browser.index', $server->ip_address) }}">
                                    <i class="fas fa-home"></i> Index
                                </a>
                            </li>
                            <li class="nav-item col px-0">
                                <a class="nav-link btn btn-flat btn-secondary{{ request()->routeIs('get.browser.login') ? ' active' : '' }}"
                                   href="{{ route('get.browser.login', $server->ip_address) }}">
                                    <i class="fas fa-sign-in-alt"></i> Login
                                </a>
                            </li>
                            <li class="nav-item col px-0">
                                <a class="nav-link btn btn-flat rounded-right btn-secondary{{ request()->routeIs('get.browser.exploits') ? ' active' : '' }}"
                                   href="{{ route('get.browser.exploits', $server->ip_address) }}">
                                    <i class="fas fa-terminal"></i> Exploits
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        @if (user()->hasBrowserAuth())
                            <div class="alert alert-warning" role="alert">
                                You're already logged in to <a
                                    href="{{ route('get.browser.index', user()->getBrowserAuth()) }}">{{ user()->getBrowserAuth() }}</a>,
                                do you want to <a href="#">log out</a>?
                            </div>
                        @endif

                        @yield('browser_content')
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        Recently visited
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            @foreach( user()->history as $item)
                                <li>
                                    <a href="{{ route('get.browser.index', $item['ip_address']) }}">{{ $item['ip_address'] }}</a>
                                    <small class="text-muted">{{ $item['human_date'] }}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Important IPs
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
