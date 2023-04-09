<?php

namespace App\Http\Controllers;

use App\Models\beli_game;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    //
    function index() {
        // $title = [
        //     'title' => 'List Game',
        // ];
        $data = beli_game::all();
        $data = beli_game::orderBy('nama', 'asc')->paginate(2);
        return view('beli_game/index')->with('data', $data);
    }

    function detail($id) {
        $data = beli_game::where('id', $id)->first();
        return view('halaman/show')->with('data', $data);
    }

    function create() {
        
    }

    // function login() {
    //     $data = [
    //         'title' => 'Halaman Login',
    //         'judul' => 'Login',
    //     ];
    //     return view("halaman/login")->with($data);
    // }
}
