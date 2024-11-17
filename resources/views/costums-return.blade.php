@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-15">
            <div class="card">
            <div class="card-header"><h2 class="mt-3"><i class="bi bi-clipboard-check"></i>  Costums Return Form </h2></div>
           
                <div class="card-body mb-3">
                    @if (session('message'))
                        <div class="alert {{session('alert-class')}}">
                            {{ session('message') }}
                        </div>
                    @endif

                   <form action="costums-return" method="POST">
                    @csrf
                    <div class="mb-3 row justify-content-center align-items-center">
                        <label for="users" class="form-label">User</label>
                        <select name="user_id" id="user_id" class="form-control inputbox" required>
                         <option value=""> Pilih User </option>
                         @foreach ($users as $item)
                             <option value="{{$item->id}}"> {{$item->username}} </option>
                         @endforeach
                        </select>
                    </div>
                     <div class="mb-3 row justify-content-center align-items-center">
                        <label for="categories" class="form-label">Costum</label>
                        <select name="categories" id="categories" class="form-control inputbox" required>
                             <option value=""> Pilih Costum </option>
                         @foreach ($categories as $item)
                             <option value="{{$item->name}}"> {{$item->name}} </option>
                         @endforeach
                        </select>
                    </div>
                    <div class="mb-3 row justify-content-center align-items-center">
                        <label for="costums" class="form-label">Warna</label>
                        <select name="costum_id" id="costum_id" class="form-control inputbox" required>
                             <option value=""> Pilih Warna </option>
                         @foreach ($costums as $item)
                             <option value="{{$item->id}}">{{$item->costum_code}}-{{$item->id}}-{{$item->warna}}</option>
                         @endforeach
                        </select>
                    </div>
                   <button type="submit" class="btn btn-outline-success btn-sm mt-2 w-100 ">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection