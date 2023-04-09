<?php

namespace App\Http\Controllers;

use App\Models\beli_game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class HalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $data = beli_game::all();
        $data = beli_game::orderBy('id', 'asc')->paginate(6);
        return view('halaman/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('halaman/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Session::flash('nama', $request->nama);
        Session::flash('platform', $request->platform);
        Session::flash('tahun_rilis', $request->tahun_rilis);
        Session::flash('ukuran_game', $request->ukuran_game);
        Session::flash('genre', $request->genre);
        Session::flash('harga', $request->harga);

        $request->validate([
            'nama' => 'required',
            'platform' => 'required',
            'tahun_rilis'=> 'required|numeric',
            'ukuran_game'=> 'required',
            'genre'=> 'required',
            'harga'=> 'required',
            'foto'=> 'required|mimes:jpeg,jpg,png',
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('img'), $foto_nama);

        $data = [
            'nama' => $request->input('nama'),
            'platform' => $request->input('platform'),
            'tahun_rilis'=> $request->input('tahun_rilis'),
            'ukuran_game'=> $request->input('ukuran_game'),
            'genre'=> $request->input('genre'),
            'harga'=> $request->input('harga'),
            'foto'=>$foto_nama,
            // 'foto'=> $request->input('foto'),
        ];
        beli_game::create($data);
        return redirect('beli_game')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = beli_game::where('id', $id)->first();
        return view('halaman/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = beli_game::where('id', $id)->first();
        return view('halaman/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'platform' => 'required',
            'tahun_rilis'=> 'required|numeric',
            'ukuran_game'=> 'required',
            'genre'=> 'required',
            'harga'=> 'required',

        ]);
        $data = [
            'nama' => $request->input('nama'),
            'platform' => $request->input('platform'),
            'tahun_rilis'=> $request->input('tahun_rilis'),
            'ukuran_game'=> $request->input('ukuran_game'),
            'genre'=> $request->input('genre'),
            'harga'=> $request->input('harga'),
        ];

        if($request->hasFile('foto')) {
            $request->validate([
                'foto'=> 'mimes:jpeg,jpg,png',
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move(public_path('img'), $foto_nama);

            $data_foto = beli_game::where('id', $id)->first();
            File::delete(public_path('img').'/'.$data_foto->foto);

            $data = [
                'foto'=>$foto_nama
            ];
        }

        beli_game::where('id', $id)->update($data);
        return redirect('beli_game')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = beli_game::where('id', $id)->first();
        File::delete(public_path('img').'/'.$data->foto);
        beli_game::where('id', $id)->delete();
        return redirect('/beli_game')->with('success', 'Berhasil menghapus data');
    }
}
