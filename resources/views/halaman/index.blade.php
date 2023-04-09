@extends('layout/template')

@section('konten')

    <title>List Game</title>
</head>
<body>
    <a href="/beli_game/create" class="btn btn-primary ">+Tambahkan Game</a>
    
      <div class="container ">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach ($data as $item)
            <div class="col-md-4">
              <div class="card shadow-lg ">
                  <img class="mx-auto card-img-top img-thumbnail" style="max-width: 250px;max-height: 450px;
                  " src="{{ url('img').'/'.$item->foto }}">
                    <div class="card-body">
                    <p class="card-text"><b>Nama: </b>{{$item->nama}}</p>
                    <p class="card-text"><b>Platform: </b>{{$item->platform}}</p>
                    <p class="card-text"><b>Tahun rilis: </b>{{$item->tahun_rilis}}</p>
                    <p class="card-text"><b>Ukuran game: </b>{{$item->ukuran_game}}</p>
                    <p class="card-text"><b>Genre: </b>{{$item->genre}}</p>
                    <p class="card-text"><b>Harga: </b>{{$item->harga}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <form action='{{url('/beli_game/'.$item->id)}}'>
                            <button class="btn btn-sm btn-outline-secondary">Detail</button>
                        </form>  
                        <form action='{{url('/beli_game/'.$item->id."/edit")}}'>
                            <button class="btn btn-sm btn-outline-secondary">Edit</button>
                        </form>                               
                        </div>
                        
                        <form onsubmit='return confirm("Ingin menghapus data ini?")' class='d-inline' action="{{ '/beli_game/'.$item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class='btn btn-sm btn-outline-secondary' type='submit'>Hapus</button>
                        </form>
                    </div>
                    </div>
              </div>
            </div>
            @endforeach
        </div>
      </div>
    {{$data->links()}}
@endsection


