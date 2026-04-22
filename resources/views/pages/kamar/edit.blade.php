@extends('layouts.app')

@section('title', 'Ubah Tamu')

@section('content')
    <div class="pt-2 pb-4">
        <h3 class="fw-bold mb-3">Ubah Kamar</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-body">
                <form action="{{ route('kamar.update', $tamu->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nomor_kamar" class="form-label">nomor kamar</label>
                        <input type="text" name="nomor_kamar" id="nomor_kamar" class="form-control @error('nomor_kamar') is-invalid @enderror" value="{{ old('nomor_kamar') ?? $tamu->nomor_kamar }}" placeholder="Masukkan nomor kamar">
                        @error('nomor_kamar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') ?? $tamu->deskripsi }}" placeholder="Masukkan deskripsi">
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">harga</label>
                        <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') ?? $tamu->harga }}" placeholder="Masukkan harga">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">status</label>
                        <input type="text" name="status" id="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') ?? $tamu->status }}" placeholder="Masukkan status">
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary"><span class="fas fa-save"></span> Simpan</button>
                    <a href="{{ route('kamar.index') }}" class="btn btn-secondary"><span class="fas fa-arrow-left"></span> Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection