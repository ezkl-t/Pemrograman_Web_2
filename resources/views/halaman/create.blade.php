@extends('layout/template')

@section('konten')
<head>
    <title>Tambah Game</title>
</head>
    <a href="/index" class="btn btn-secondary btn-lg"><< Batal penambahan</a>
    <form method="post" action="/beli_game" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama game</label>
            <input type="text" class="form-control" value="{{ Session::get('nama') }}" name="nama" id="nama">
        </div>

        <div class="mb-3">
            <label for="platform" class="form-label">Platform</label>
            <input type="text" class="form-control" value="{{ Session::get('platform') }}" name="platform" id="platform">
        </div>
    
        <div class="mb-3">
            <label for="tahun_rilis" class="form-label">Tahun rilis</label>
            <input type="text" class="form-control" value="{{ Session::get('tahun_rilis') }}" name="tahun_rilis" id="tahun_rilis">
        </div>
        
        <div class="mb-3">
            <label for="ukuran_game" class="form-label">Ukuran game</label>
            <input type="text" class="form-control" value="{{ Session::get('ukuran_game') }}" name="ukuran_game" id="ukuran_game">
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" value="{{ Session::get('genre') }}" name="genre" id="genre">
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" value="{{ Session::get('harga') }}" name="harga" id="harga">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection