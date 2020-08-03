@extends('pages.browser.layouts.browser')

@section('browser_content')
    <span class="float-sm-right badge badge-{{ $server->type['color'] }}">{{ $server->type['type'] }}</span>
    {{ $server->webserver }}
@endsection
