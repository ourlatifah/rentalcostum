@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2 class="mt-3"><i class="bi bi-clipboard-check"></i> Costum List</h2></div>
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
                
               <div style="margin-right: 20px; margin-left: 20px; display: flex; flex-direction: column; align-items: flex-end;">
               <a class="btn btn-outline-primary mb-4" href="add-costum"> <i class="bi bi-plus-square"> </i> Tambah Data </a>
                    <table class="table table-striped table table-bordered border-info">
                    <thead>
                    <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Code</th>
                    <th style="text-align: center;">Warna Costum</th>
                    <th style="text-align: center;">Image Costum</th>
                    <th style="text-align: center;">Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-bordered border-info">
                    @foreach($costums as $item)
                    <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td style="text-align: center;">{{ $item->costum_code }}</td>
                    <td style="text-align: center;">{{ $item->warna }}</td>
                    <td>
                    <img src="{{ asset('/storage/public/uploads/costums/' . $item->image) }}" alt="Image" style="max-width: 500px"></td>
                    <td style="text-align: center;">
                    <a class="btn btn-outline-primary" href=""><i class="bi bi-pencil-square"></i> Edit</a>
                    <a class="btn btn-outline-danger" href=""><i class="bi bi-trash"></i> Delete</a>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                 </div>
                </div>
                </div>
             </div>
            </div>
         </div>
        </div>
    </div>
@endsection