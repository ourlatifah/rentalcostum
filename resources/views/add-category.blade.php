@extends('layouts.app')

@section('content')
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2 class="mt-3"><i class="bi bi-clipboard-check"></i> Tambah Category Baru</h2></div>
                
           <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
           <form action="categories" method="POST" >
            @csrf
            <div class="form-group">
                <label for="name" class="form-label"> Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control mt-2" name="name" id="name" placeholder="Nama Category" required />
            </div>
            <button type="submit" class="btn btn-outline-success btn-sm mt-2 ">Simpan</button>
            <a href="categories" class="btn btn-sm btn-outline-danger mt-2"> Batal </a>
           </div>
             </div>
                
            </div>
        </div>
    </div>
</div>
@endsection