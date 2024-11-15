@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h4 class="mt-2">{{ __('Welcome!') }}</h4></div>

                <div class="card-body mb-3">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as a Admin.') }}
                </div>

                <div class="card-body row mt-2 justify-content-center">
                    <div class="col-lg-3 btn btn-outline-primary" style="margin-right: 20px">
                    <div class="card-data row gx-4">
                    <i class="bi bi-ui-checks-grid"></i>
                    <div class="col-7 d-flex flex-column justify-content-center">
                    <a>Costums</a>
                    <a class="card-count">{{ $costumsCount }}</a>
                    </div>
                    </div>
                    </div>
                    {{-- </div> --}}
                    
                    {{-- <div class="card-body row mt-2"> --}}
                    <div class="col-lg-3 btn btn-outline-warning"  style="margin-right: 20px;">
                    <div class="card-data row gx-4">
                    <i class="bi bi-hdd-stack"></i>
                    <div class="col-9 d-flex flex-column justify-content-center">
                    <a>Categories</a>
                    <a class="card-count">{{$categoriesCount}}</a>
                    </div>
                    </div>
                    </div>
                    {{-- </div> --}}

                    {{-- <div class="card-body row mt-2"> --}}
                    <div class="col-lg-3 btn btn-outline-success"  style="margin-right: 20px;">
                    <div class="card-data row">
                    <i class="bi bi-people"></i>
                    <div class="col-6 d-flex flex-column justify-content-center">
                    <a>Users</a>
                    <a class="card-count">{{$userCount}}</a>
                    </div>
                    </div>
                    {{-- </div> --}}
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