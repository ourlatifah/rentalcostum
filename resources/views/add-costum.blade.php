@extends('layouts.app')

@section('content')
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2 class="mt-3"><i class="bi bi-clipboard-check"></i> Tambah Costum Baru</h2></div>
                
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
           <form action="costums" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="costum_code" class="form-label"> Code <span class="text-danger">*</span></label>
                <input type="text" class="form-control mt-2" name="costum_code" id="costum_code" placeholder="Code Costum" required />
            </div>
            <div class="form-group">
                <label for="warna" class="form-label"> Warna Costum <span class="text-danger">*</span></label>
                <input type="text" class="form-control mt-2" name="warna" id="warna" placeholder="Warna Costum" required />
            </div>
            <div class="form-group">
                <label for="image" class="form-label"> Image Costum <span class="text-danger">*</span></label>
                <input type="file" class="form-control mt-2" name="image" id="image" required />
            </div>
            <div class="form-group">
                <label for="slug" class="form-label"> Slug <span class="text-danger">*</span></label>
                <input type="text" class="form-control mt-2" name="slug" id="slug" placeholder="Slug Costum" required />
            </div>
            
            <button type="submit" class="btn btn-outline-success btn-sm mt-2 ">Simpan</button>
            <a href="costums" class="btn btn-sm btn-outline-danger mt-2"> Batal </a>
           </div>
             </div>
                
            </div>
        </div>
    </div>
</div>
@endsection