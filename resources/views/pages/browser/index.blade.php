@extends('pages.browser.layouts.browser')

@section('browser_content')
    <span class="float-sm-right badge badge-{{ $type['color'] }}">{{ $type['type'] }}</span>
    {{ $server->webserver }}
@endsection
