@extends('layouts.app')
@section('title', 'Detail reservasi')

@section('content')
    <div class="pt-2 pb-4">
        <h3 class="fw-bold mb-3">Detail reservasi</h3>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <table class="table table-sm table-striped">
                    <tr>
                        <th width="25%">nama user</th>
                        <td>{{ $reservasi->user->name }}</td>
                    </tr>
                    <tr>
                        <th>id kamar</th>
                        <td>{{ $reservasi->kamar->nomor_kamar }}</td>
                    </tr>
                    <tr>
                        <th>tanggal check_in</th>
                        <td>{{ $reservasi->tanggal_check_in }}</td>
                    </tr>
                    <tr>
                        <th>tanggal check_out</th>
                        <td>{{ $reservasi->tanggal_check_out }}</td>
                    </tr>
                    <tr>
                        <th>total harga</th>
                        <td>{{ $reservasi->total_harga }}</td>
                    </tr>
                    <tr>
                        <th>status</th>
                        <td>{{ $reservasi->status }}</td>
                    </tr>
                    <tr>
                        <th>DITAMBAHKAN PADA</th>
                        <td>{{ \Carbon\Carbon::parse($reservasi->created_at)->isoFormat('DD/MM/YYYY  HH:mm') }}</td>
                    </tr>
                    <tr>
                        <th>TERAKHIR DIUPDATE</th>
                        <td>{{ \Carbon\Carbon::parse($reservasi->updated_at)->isoFormat('DD/MM/YYYY  HH:mm') }}</td>
                    </tr>
                </table>

                <div class="d-glex gap-2">
                <a href="{{ route('reservasi.index') }}" class="btn btn-secondary "><span class="fas fa-arrow-left"></span> Kembali</a>
                <a href="{{ route('reservasi.edit', $reservasi->id) }}" class="btn btn-primary"><span class="fas fa-edit"></span> Edit</a>
                <a href="#" class="btn btn-danger" onclick="actionToDelete('{{ route('reservasi.destroy', $reservasi->id) }}')"><span class="fas fa-trash"></span> Hapus</a>
                </div>
            </div>
    </div>

    <form action="" method="post" id="form-delete">
        @csrf
        @method('delete')
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
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
@endpush