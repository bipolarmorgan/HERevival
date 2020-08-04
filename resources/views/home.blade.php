@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header border-bottom-0">{{ __('Dashboard') }}</div>
                    <table class="table table-striped mb-0 table-bordered table-icon">
                        <tr>
                            <td><i class="fas fa-microchip"></i></td>
                            <td>Processor</td>
                            <td>{{ auth()->user()->servers()->sum('cpu') / 1000 }} GHz</td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-hdd"></i></td>
                            <td>Hard Drive</td>
                            <td>{{ auth()->user()->servers()->sum('hdd') / 1000 }} GB</td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-memory"></i></td>
                            <td>Memory</td>
                            <td>{{ auth()->user()->servers()->sum('ram') / 1024 }} MB</td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-ethernet"></i></td>
                            <td>Network</td>
                            <td>{{ auth()->user()->network->speed }} Mbit/s</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
