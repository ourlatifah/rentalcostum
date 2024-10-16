@extends('layouts.app')

@section('content')
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2 class="mt-3"><i class="bi bi-clipboard-check"></i> Categories List</h2></div>
               <div class="mt-2" style="margin-right: 20px ; margin-left: 20px">
               <div class="btn btn-outline-primary mb-3" href=""> <i class="bi bi-plus-square"> </i> Tambah Data</div>
                    <table class="table table-striped table table-bordered border-info">
                    <thead>
                    <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Categories</th>
                    <th style="text-align: center;">Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-bordered border-info">
                    @foreach ($categories as $item)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">{{ $item->name }}</td>
                            <td style="text-align: center;">
                            <a class="btn btn-outline-warning" href="">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <a class="btn btn-outline-danger" href="">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
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
@endsection