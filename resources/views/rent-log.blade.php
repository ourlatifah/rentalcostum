@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header"><h2 class="mt-3"><i class="bi bi-journals"></i> User Rent Logs </h2></div>
             <x-rent-log-table :rentlog="$rentlogs" />
                   
            </div>
        </div>
    </div>
</div>

@endsection