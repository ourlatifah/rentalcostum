@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-15">
            <div class="card">
            <div class="card-header"><h2 class="mt-3"><i class="bi bi-journals"></i> User Rent Logs </h2></div>
             <x-rent-log-table :rentlog="$rentlogs" />
                  
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
