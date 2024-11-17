@extends('layouts.app')

@section('content')
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2 class="mt-3"><i class="bi bi-clipboard-check"></i> Detail Client </h2></div>
                
           <div class="card-body">
            @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
            <div class="row justify-content-center">
            @if ($users && $users->status == 'inactive')
            <a class="btn btn-outline-success mb-4" href="/users-approve/{{$users->slug}}"> </i> Approved User </a>
            @else
            <a class="btn btn-outline-danger mb-4" href="/users-destroy/{{$users->slug}}"> </i> Ban User </a>
            @endif
            <a class="btn btn-outline-secondary mb-4" href="users"> <i class="bi bi-backspace-reverse"></i> Kembali </a>
           
            <div class="form-group">
                <label for="username" class="form-label"> Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control mt-2" name="username" id="username" value="{{ $users->username }}" />
            </div>
            <div class="form-group">
                <label for="phone" class="form-label"> No Phone <span class="text-danger">*</span></label>
                <input type="text" class="form-control mt-2" name="phone" id="phone" value="{{ $users->phone }}" />
            </div>
            <div class="form-group">
                <label for="address" class="form-label"> Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control mt-2" name="address" id="address" style="resize: none">{{ $users->address }}</textarea>
            </div>
            <div class="form-group">
                <label for="status" class="form-label"> Status <span class="text-danger">*</span></label>
                <input type="text" class="form-control mt-2" name="status" id="status" value="{{ $users->status }}" />
            </div>
            </div>
        </div>
    </div>
</div>
@endsection