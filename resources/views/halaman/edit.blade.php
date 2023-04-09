@extends('layout/template')

@section('konten')
<head>
    <title>Tambah Game</title>
</head>
    <a href="/index" class="btn btn-secondary btn-lg"><< Kembali</a>
    <form method="post" action="{{ '/beli_game/'.$data->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h1>ID : {{ $data->id }}</h1>
        </div>    
        <div class="mb-3">
        <label for="nama" class="form-label">Nama game</label>
        <input type="text" class="form-control" value="{{ $data->nama }}" name="nama" id="nama">

        <div class="mb-3">
        <label for="platform" class="form-label">Platform</label>
        <input type="text" class="form-control" value="{{ $data->platform }}" name="platform" id="platform">
    
        <div class="mb-3">
        <label for="tahun_rilis" class="form-label">Tahun rilis</label>
        <input type="text" class="form-control" value="{{ $data->tahun_rilis }}" name="tahun_rilis" id="tahun_rilis">
        
        <div class="mb-3">
        <label for="ukuran_game" class="form-label">Ukuran game</label>
        <input type="text" class="form-control" value="{{ $data->ukuran_game }}" name="ukuran_game" id="ukuran_game">

        <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" class="form-control" value="{{ $data->genre }}" name="genre" id="genre">
        
        <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control" value="{{ $data->harga }}" name="harga" id="harga">

        @if ($data->foto)
                <div class="mb-3">
                    <img style="max-width: 150px;
                    max-height= 150px;" src="{{ url('img').'/'.$data->foto }}"/>
                </div>
        @endif
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" value="{{ Session::get('foto') }}" name="foto" id="foto">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection