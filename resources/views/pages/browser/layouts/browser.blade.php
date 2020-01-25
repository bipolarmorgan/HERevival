@extends('layouts.app', ['page_name' => 'Browser'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <form method="post" action="{{ route('post.browser.ip', session('browser_session')) }}">
                        @csrf
                        <input class="form-control" name="ip" placeholder="{{ user()->getBrowserSession()['ip_address'] }}">
                    </form>
                </div>
            </div>
            @if (session('browser_auth') && session('browser_session') !== session('browser_auth'))
                <div class="alert alert-warning" role="alert">
                    You're already logged in to <a href="{{ route('get.browser.ip', session('browser_auth')) }}">{{ session('browser_auth') }}</a>, do you want to <a href="#">log out</a>?
                </div>
            @endif
            <div class="card mb-3">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item{{ request()->route()->getName() !== "get.browser.index" ? ' border rounded' : '' }}">
                            <a class="nav-link{{ request()->route()->getName() !== "get.browser.index" ? '' : ' active' }}" href="{{ route('get.browser.index') }}"><i class="fad fa-home-lg"></i> Index</a>
                        </li>
                        <li class="nav-item{{ request()->route()->getName() !== "get.browser.login" ? ' border rounded' : '' }} ml-2">
                            <a class="nav-link{{ request()->route()->getName() !== "get.browser.login" ? '' : ' active' }}" href="{{ route('get.browser.login') }}"><i class="fad fa-sign-in"></i> Login</a>
                        </li>
                        <li class="nav-item{{ request()->route()->getName() !== "get.browser.hack" ? ' border rounded' : '' }} ml-2">
                            <a class="nav-link{{ request()->route()->getName() !== "get.browser.hack" ? '' : ' active' }}" href="{{ route('get.browser.hack') }}"><i class="fad fa-terminal"></i> Hack</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    @if (!is_null_or_empty(user()->getBrowserSessionValue('auth')) && user()->getBrowserSessionValue('auth') !== user()->getBrowserSessionValue('ip_address'))
                        <div class="alert alert-warning" role="alert">
                            You're already logged in to <a href="{{ route('get.browser.ip', user()->getBrowserSessionValue('auth')) }}">{{ user()->getBrowserSessionValue('auth') }}</a>, do you want to <a href="#">log out</a>?
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
@endsection
