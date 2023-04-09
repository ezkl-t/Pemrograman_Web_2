@extends('layout/template')

@section('konten')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Detail Game</title>
</head>
<body>
    <div>
        <a href="/index" class="btn btn-secondary btn-lg"><< Kembali</a>
        <h1>ID: {{$data->id}}</h1>
        <h1>{{$data->nama}}</h1>
        @if ($data->foto)
                <div class="mb-3">
                    <img style="max-width: 250px;
                    max-height= 250px;" src="{{ url('img').'/'.$data->foto }}"/>
                </div>
        @endif
        <p><b>Platform</b> {{$data->platform}}</p>
        <p><b>Tahun Rilis</b> {{$data->tahun_rilis}}</p>
        <p><b>Ukuran Game</b> {{$data->ukuran_game}}</p>
        <p><b>Genre</b> {{$data->genre}}</p>
        <p><b>Harga</b> {{$data->harga}}</p>
    </div>
@endsection


