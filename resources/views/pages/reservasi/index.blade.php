@extends('layouts.app')

@section('title', 'Data reservasi')
    

@section('content')
    <div class="pt-2 pb-4">
        <h3 class="fw-bold mb-3">Data reservasi</h3>
    </div>

    <a href="{{ route('reservasi.create') }}" class="btn btn-primary mb-3"><span class="fas fa-plus"></span> Tambah Baru</a>
    
    <div class="card card-body">
        <div class="table-responsive">
            <table class=" table table-hover datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>user id</th>
                            <th>kamar id</th>
                            <th>tanggal check_in</th>
                            <th>tanggal check_out</th>
                            <th>total harga</th>
                            <th>status</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservasi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->kamar->nomor_kamar }}</td>
                                <td>{{ $item->tanggal_check_in }}</td>
                                <td>{{ $item->tanggal_check_out }}</td>
                                <td>{{ $item->total_harga }}</td>
                                <td>
                                    {{ $item->status ?? 'booking' }}
                                </td>
                                <td>
                                    @if($item->id == 1)
                                        <span class="text-muted">Tidak dapat diubah</span>
                                    @else
                                
                                        <a href="{{ route('reservasi.edit', $item->id) }}" class="btn text-primary btn-link py-0 px-2 text-decoration-none"><span class="fas fa-edit"></span> Edit</a>
                                        <a href="{{ route('reservasi.show', $item->id) }}" class="btn text-info btn-link py-0 px-2 text-decoration-none "><span class="fas fa-eye"></span> Detail</a>
                                        <a href="#" class="btn text-danger btn-link py-0 px-2 text-decoration-none" onclick="actionToDelete('{{ route('reservasi.destroy', $item->id) }}')"><span class="fas fa-trash"></span> Hapus</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>

    <form action="" method="post" id="form-delete">
        @csrf
        @method('delete')
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('.datatable').DataTable();
        });

        function actionToDelete(url) {
            swal({
                title: "Apakah Anda yakin?",
                text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ["Batal", "Ya, Hapus!"]
            })
            .then((confirm) => {
                if (confirm) {
                    $('#form-delete').attr('action', url);
                    $('#form-delete').submit();
                }
            });
        }
    </script>

     @if (session('success'))
            <script>
                swal({
                    title: "success",
                    text: "{{ session('success') }}",
                    icon: "success",
                });
            </script>

        @endif
@endpush