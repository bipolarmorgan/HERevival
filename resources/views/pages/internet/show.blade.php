@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-bottom-0 pb-0">
                        <form method="post" action="{{ route('internet.navigate') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-9">
                                    <input type="text" class="form-control"
                                           placeholder="{{ $network->ip_address ?? 'Enter an IP Address..' }}" name="ip_address">
                                </div>

                                <div class="col-md-3 mr-auto">
                                    <div class="btn-group w-100 block" role="group" aria-label="Basic example">
                                        <button class="btn btn-secondary" type="submit">
                                            Go <i class="fas fa-chevron-double-right"></i>
                                        </button>
                                        <button class="btn btn-secondary" type="button" onclick="window.location.reload()">
                                            <i class="fas fa-sync-alt"></i> Refresh
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="container mt-2 mb-0">
                            <div class="row mb-0">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                           role="tab" aria-controls="home" aria-selected="false">
                                            <i class="fas fa-home"></i> Index
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="login-tab" data-toggle="tab" href="#login" role="tab"
                                           aria-controls="login" aria-selected="false">
                                            <i class="fas fa-sign-in-alt"></i> Login
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="hack-tab" data-toggle="tab" href="#hack" role="tab"
                                           aria-controls="hack" aria-selected="false">
                                            <i class="fas fa-terminal"></i> Hack
                                        </a>
                                    </li>
                                </ul>
                                <div class="ml-auto d-flex align-items-center">
                                    <span class="badge badge-success">
                                        {{ $network->owner_type }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        this is webservur
                                    </div>
                                    <div class="tab-pane" id="login" role="tabpanel" aria-labelledby="login-tab">...
                                    </div>
                                    <div class="tab-pane" id="hack" role="tabpanel" aria-labelledby="hack-tab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3 offset-md-3">
                                                    <button class="btn btn-lg btn-secondary">
                                                        Bruteforce attack
                                                    </button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button class="btn btn-lg btn-secondary">
                                                        Exploit attack
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
