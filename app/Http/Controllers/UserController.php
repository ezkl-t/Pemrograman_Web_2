<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['user'] = DB::select('SELECT * FROM mahasiswa');
        
        return view('user', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahMahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nimInput = $request->input('nimInput');
        $namaInput = $request->input('namaInput');
        $prodiInput = $request->input('prodiInput');

        // dd($request->input(''));

        $query = DB::table('mahasiswa')->insert([
            'nim' => $nimInput,
            'nama' => $namaInput,
            'prodi' => $prodiInput
        ]);

        if ($query) {
            return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('mahasiswa')->with('failed', 'Data Gagal Ditambahkan');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data['mahasiswa'] = DB::table('mahasiswa')->where('id', $id)->first();

        return view('editMahasiswa', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $nimInput = $request->input('nimInput');
        $namaInput = $request->input('namaInput');
        $prodiInput = $request->input('prodiInput');

        $query = DB::table('mahasiswa')->where('id', $id)->update([
            'nim' => $nimInput,
            'nama' => $namaInput,
            'prodi' => $prodiInput
        ]);

        if ($query) {
            return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('mahasiswa')->with('failed', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $query = DB::table('mahasiswa')->where('id', $id)->delete();

        if ($query) {
            return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('mahasiswa')->with('failed', 'Data Gagal Dihapus');
        }

    }
}
