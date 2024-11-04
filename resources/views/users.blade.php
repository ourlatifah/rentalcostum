@extends('layouts.app')

@section('content')
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2 class="mt-3"><i class="bi bi-clipboard-check"></i> Clients List</h2></div>
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
               <div style="margin-right: 20px; margin-left: 20px; display: flex; flex-direction: column; align-items: flex-end;">
               <a class="btn btn-outline-primary mb-4" href="registered-users"> <i class="bi bi-plus-square"> </i> Registered Users </a>
                    <table class="table table-striped table table-bordered border-info">
                    <thead>
                    <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Username</th>
                    <th style="text-align: center;">No Phone</th>
                    <th style="text-align: center;">Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-bordered border-info">
                    @foreach ($users as $item)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">{{ $item->username }}</td>
                            <td style="text-align: center;">
                            @if ($item->phone)
                                {{ $item->phone }}
                            @else
                                -
                            @endif
                            </td>
                            <td style="text-align: center;">
                            <a class="btn btn-outline-warning" href="/users-detail/{{$item->slug}}">
                               <i class="bi bi-collection"></i> Detail
                            </a>
                            <a class="btn btn-outline-danger"onclick="handleDestroy(`{{ route('users.delete', $item->slug) }}`)";
                            formdelete.submit();>
                                <i class="bi bi-trash"></i> Ban User
                            </a>
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
    </div>
<form action="" id="form-delete" method="POST" >
                    @csrf
                    @method('DELETE')
                    </form> 
<script>
    function handleDestroy(url) {
        const formDelete = document.getElementById('form-delete');
        formDelete.action = url; // Set action ke URL yang diberikan
        formDelete.submit(); // Kirim form
    }
</script>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        function handleDestroy(url) {
        swal({
            title: "Apakah anda yakin?",
            text: "Data yang di hapus tidak bisa dikembalikan",
            icon: "warning",
            buttons: ['Batal', 'Ya Hapus!'],
            dangerMode: true,
        })
        .then((confirmed) => {
            if (confirmed) {
                $('#form-delete').attr('action',url);
                $('#form-delete').submit();
            }
        });
            
        }
        </script>
@endpush


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