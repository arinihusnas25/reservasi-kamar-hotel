@extends('layouts.app')

@section('title', 'Data reservasi')

@section('content')
    <div class="pt-2 pb-4">
        <h3 class="fw-bold mb-3">Tambah reservasi</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-body">
                <form action="{{ route('reservasi.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tamu_id" class="form-label">id tamu</label>
                        <input type="text" name="tamu_id" id="tamu_id" class="form-control @error('tamu_id') is-invalid @enderror" value="{{ old('tamu_id') }}" placeholder="Masukkan id tamu">
                        @error('tamu_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kamar_id" class="form-label">id kamar</label>
                        <input type="text" name="kamar_id" id="kamar_id" class="form-control @error('kamar_id') is-invalid @enderror" value="{{ old('kamar_id') }}" placeholder="Masukkan id kamar">
                        @error('kamar_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_check_in" class="form-label">tanggal check_in</label>
                        <input type="text" name="tanggal_check_in" id="tanggal_check_in" class="form-control @error('tanggal_check_in') is-invalid @enderror" value="{{ old('tanggal_check_in') }}" placeholder="Masukkan tanggal check_in">
                        @error('tanggal_check_in')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_check_out" class="form-label">tanggal check_out</label>
                        <input type="text" name="tanggal_check_out" id="tanggal_check_out" class="form-control @error('tanggal_check_out') is-invalid @enderror" value="{{ old('tanggal_check_out') }}" placeholder="Masukkan tanggal check_out">
                        @error('tanggal_check_out')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="total_harga" class="form-label">total harga</label>
                        <input type="text" name="total_harga" id="total_harga" class="form-control @error('total_harga') is-invalid @enderror" value="{{ old('total_harga') }}" placeholder="Masukkan total harga">
                        @error('total_harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">status</label>
                        <input type="text" name="status" id="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}" placeholder="Masukkan status">
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary"><span class="fas fa-save"></span> Simpan</button>
                    <a href="{{ route('reservasi.index') }}" class="btn btn-secondary"><span class="fas fa-arrow-left"></span> Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection