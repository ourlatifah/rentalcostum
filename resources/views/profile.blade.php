@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Welcome!') }}</div>
                         <div class="card-body"> {{ __('You are logged in as a user.') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    <div class="card-body"><h2 class="mt-3"><i class="bi bi-journals"></i> Your Rent Logs </h2></div>
           
                         <x-rent-log-table :rentlog="$rentlogs" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection