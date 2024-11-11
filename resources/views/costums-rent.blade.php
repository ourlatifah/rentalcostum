@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header"><h2 class="mt-3"><i class="bi bi-clipboard-check"></i>  Costums Rent Form </h2></div>
           
                <div class="card-body mb-3">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form action="" method="POST">
                    <div class="mb-3">
                        <label for="users" class="form-label">User</label>
                        <select name="users" id="users" class="form-control usercostum">
                         <option value=""> Pilih User </option>
                         @foreach ($users as $item)
                             <option value="{{$item->id}}"> {{$item->username}} </option>
                         @endforeach
                        </select>
                    </div>
                     <div class="mb-3">
                        <label for="categories" class="form-label">Costum</label>
                        <select name="categories" id="categories" class="form-control usercostum">
                             <option value=""> Pilih Costum </option>
                         @foreach ($categories as $item)
                             <option value="{{$item->id}}"> {{$item->name}} </option>
                         @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="costums" class="form-label">Warna</label>
                        <select name="costums" id="costums" class="form-control usercostum">
                             <option value=""> Pilih Warna </option>
                         @foreach ($costums as $item)
                             <option value="{{$item->id}}"> {{$item->warna}} </option>
                         @endforeach
                        </select>
                    </div>
                   </form>
                   <button type="submit" class="btn btn-outline-success btn-sm mt-2 w-100 ">Submit</button>

            </div>
        </div>
    </div>
</div>

@endsection