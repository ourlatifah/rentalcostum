@extends('layouts.app')

@section('content')
   <div class="container">
            <div class="card-header text-center"><h2 class="mt-1"><i class="bi bi-clipboard-check"></i> Koleksi Kostum </h2></div>
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
                    <h5 class="card-title">{{$item->costum_code}}</h5>
                    <p class="card-text">{{$item->warna}}</p>
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