<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function index(){
        return '<h1>Admin dengan nama</h1>';
    }

    function detail($id) {
        return "<h1>Admin dengan ID $id</h1>";
    }
}
