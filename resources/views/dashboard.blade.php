@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as a Admin.') }}
                </div>

                <div class="card-body row mt-2">
                    <div class="col-lg-4 btn btn-outline-primary">
                    <div class="card-data row">
                    <i class="bi bi-ui-checks-grid"></i>
                    <div class="col-6 d-flex flex-column justify-content-center">
                    <a>Costums</a>
                    <a class="card-count">{{ $costumCount }}</a>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    <div class="card-body row mt-2">
                    <div class="col-lg-4 btn btn-outline-warning">
                    <div class="card-data row">
                    <i class="bi bi-hdd-stack"></i>
                    <div class="col-7 d-flex flex-column justify-content-center">
                    <a>Categories</a>
                    <a class="card-count">{{$categoryCount}}</a>
                    </div>
                    </div>
                    </div>
                    </div>

                    <div class="card-body row mt-2">
                    <div class="col-lg-4 btn btn-outline-success">
                    <div class="card-data row">
                    <i class="bi bi-people"></i>
                    <div class="col-6 d-flex flex-column justify-content-center">
                    <a>Clients</a>
                    <a class="card-count">{{$categoryCount}}</a>
                    </div>
                    </div>
                    </div>
                </div>

                <div class="card-footer mt-2">
                    <a class="btn btn-outline-danger" href="{{ route('logout') }}">
                        {{ __('Logout') }}
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection