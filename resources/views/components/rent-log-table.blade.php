
    <div class="card-body mb-3">
                    @if (session('message'))
                        <div class="alert {{session('alert-class')}}">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-striped table table-bordered border-info">
                    <thead>
                    <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">User</th>
                    <th style="text-align: center;">Costum</th>
                    <th style="text-align: center;">Rent Date</th>
                    <th style="text-align: center;">Return Date</th>
                    <th style="text-align: center;">Actual Return Date</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="table-bordered border-info">
                            @foreach ($rentlog as $item)
                            <tr class= "{{$item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'bg-danger' : 'bg-success')}}" style="--bs-bg-opacity: .5;">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->user->username}}</td>
                                <td>{{$item->costum->costum_code}}-{{$item->costum->warna}}</td>
                                <td>{{$item->rent_date}}</td>
                                <td>{{$item->return_date}}</td>
                                <td>{{$item->actual_return_date}}</td>
                                <td>{{$item->actual_return_date == null ? 'Belum Dikembalikan' : ($item->return_date < $item->actual_return_date ? 'Terlambat' : 'Tepat Waktu')}}</td>
                                <td>
                                @if(auth()->user()->role_id == 1)
                                    <a class="btn btn-outline-danger" onclick="handleDestroy(`{{ route('rent-log.destroy', $item->id) }}`);">
                                        <i class="bi bi-trash"></i> Hapus
                                    </a>
                                @else
                                    <span class="text-muted"> - </span>
                                @endif
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
