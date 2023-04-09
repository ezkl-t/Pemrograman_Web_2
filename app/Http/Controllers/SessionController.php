<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    //
    function index() {
        return view("sesi/index");
    }

    function login(Request $request) {

        Session::flash('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)) {
            // return 'sukses';
            return redirect('beli_game')->with('success', Auth::user()->nama, 'Telah berhasil login');
        }else{
            // return 'gagal';
            return redirect('sesi')->withErrors('Email atau password yang dimasukkan salah');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success', 'Telah berhasil logout');
    }

    function register(){
        return view('sesi/register');
    }

    function create(Request $request){
        Session::flash('nama', $request->nama);
        Session::flash('email', $request->email);
        $request->validate([
            'nama'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:8',
            ]
        );
    
        $data = [
            'nama'=>$request->nama,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];

        User::create($data);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)) {
            // return 'sukses';
            return redirect('beli_game')->with('success', Auth::user()->nama . 'Telah berhasil login');
        }else{
            // return 'gagal';
            return redirect('sesi')->withErrors('Email atau password yang dimasukkan salah');
        }
    }
}
