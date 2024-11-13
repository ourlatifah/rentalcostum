@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header"><h2 class="mt-3"><i class="bi bi-bar-chart-line"></i> Rent Logs List </h2></div>
           
                <div class="card-body mb-3">
                    @if (session('message'))
                        <div class="alert {{session('alert-class')}}">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Costum</th>
                                <th>Rent Date</th>
                                <th>Return Date</th>
                                <th>Actual Return Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentlogs as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->user->username}}</td>
                                <td>{{$item->costum->warna}}</td>
                                <td>{{$item->rent_date}}</td>
                                <td>{{$item->return_date}}</td>
                                <td>{{$item->actual_return_date}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                   
            </div>
        </div>
    </div>
</div>

@endsection