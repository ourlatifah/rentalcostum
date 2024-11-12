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
           <form action="{{ route('costum.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="costum_code" class="form-label"> Code <span class="text-danger">*</span></label>
                <input type="text" class="form-control mt-2" name="costum_code" id="costum_code" placeholder="Code Costum" required />
            </div>
            <div class="form-group">
                <label for="warna" class="form-label"> Warna <span class="text-danger">*</span></label>
                <input type="text" class="form-control mt-2" name="warna" id="warna" placeholder="Warna Costum" required />
            </div>
            <div class="form-group">
                <label for="image" class="form-label"> Foto Costum <span class="text-danger">*</span></label>
                <input type="file" class="form-control mt-2" name="image" id="image" required />
            </div>
            {{-- <div class="form-group">
                <label for="slug" class="form-label"> Slug <span class="text-danger">*</span></label>
                <select name="slug" id="slug" class="form-control" class="form_select" required>
                <option value=""> Pilih Slug</option>
                 @foreach ($categories as  $item)
                <option>{{  $item->slug }}</option>
                @endforeach
                </select>
            </div> --}}
            <div class="form-group">
                <label for="categories" class="form-label"> Category <span class="text-danger">*</span></label>
                <select name="category_id" id="categories" class="form-control" class="form_select" required>
                <option value=""> Pilih Category </option>
                 @foreach ($categories as  $item)
                <option value="{{  $item->id }}">{{  $item->name }}</option>
                @endforeach
                </select>
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