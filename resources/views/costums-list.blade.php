@extends('layouts.app')

@section('content')
   <div class="container">
            <div class="card-header text-center"><h2 class="mt-1"><i class="bi bi-ui-checks-grid"></i> Koleksi Kostum </h2></div>
        
        {{-- <form action="/" method="GET">
            <div class="row my-3">
            <div class="col-3-lg-3 col-md-6 col-sm-6 mb-3">
            <select type="search" name="category" id="category" class="form-control">
            <option value="">Cari Kategori</option>
             @foreach ($categories as  $item)
                <option value="{{  $item->id }}">{{  $item->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="col-3-lg-3 col-md-6 col-sm-6 mb-3">  
            <div class="input-group mb-3">
            <input type="search" name="warna" id="warna" class="form-control" placeholder="Cari Warna">
            <button class="btn btn-info" type="submit" >Cari</button>
            </div>
            </div>
        </form> --}}
        
            <div class="my-5">
            <div class="row cols-md-3 g-0">
            @foreach ($costums as $item)
            <div class="col-3-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="card" style="width: 18rem;">
                 <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/uploads/costums/' . $item->image) }}" 
                            alt="{{ $item->warna }} Costum" 
                            class="img-fluid" 
                            style="max-width: 150px; height: auto;" 
                            onerror="this.onerror=null; this.src='{{ asset('path/to/default/image.jpg') }}';" class="card-img-top" draggable="false"></div>
                <div class="card-body">
                    <h5 class="card-title">{{$item->costum_code}}-{{$item->id}}</h5>
                    <p class="card-text">Warna : {{$item->warna}}</p>
                     <p class="card-text text-end {{$item->status == 'in stock' ? 'text-success' : 'text-danger'}}">{{$item->status}}</p>
                </div>
                </div>
                </div>
                @endforeach
                    </div>
                 </div>
              </div>
            </div>
@endsection