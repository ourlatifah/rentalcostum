@extends('layouts.app')

@section('content')
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2 class="mt-3"><i class="bi bi-clipboard-check"></i> Categories List</h2></div>
                <div class="card-body">
                
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                
               <div style="margin-right: 20px; margin-left: 20px; display: flex; flex-direction: column; align-items: flex-end;">
               <a class="btn btn-outline-primary mb-4" href="add-category"> <i class="bi bi-plus-square"> </i> Tambah Data </a>
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
                            <a class="btn btn-outline-warning" href="edit-category/{{$item->slug}}">
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
        </div>
    </div>
<form action="" id="form-delete" method="POST" >
                    @csrf
                    @method('DELETE')
                    </form> 

@endsection
@push('scripts')
<link rel="stylesheet" href="{{asset('/vendors/simple-datatables/style.css')}}">
@endpush

@push('scripts')
<script src="{{asset('/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script>
    let datatable = document.querySelector('#datatable');
    new simpleDatatables.DataTable(datatable);
</script>
@endpush

 @push('scripts')