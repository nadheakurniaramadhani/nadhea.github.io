<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index (){
        return view ('dashboard.dashboard');
    }
    // function admin()
    // {
    //     return view ('kerangka.master');
    // }
    function pimpinan()
    {
        return view ('');
    }
    function petugas()
    {
        $data = User::all();
        return view ('petugas.index', compact('data'));
    }

    // function admin()
    // {
    //     echo "Hallo, selamat datang di halaman admin";
    //     //echo "<h1>" . Auth::user()->name . "</h1>"; 
    //     echo "<a href='/logout'>Logout >></a>";

    // }
    // function petugas()   
    // {
    //     echo "Hallo, selamat datang";
    //     //echo "<h1>" . Auth::user()->name . "</h1>"; 
    //     echo "<a href='/logout'>Logout >></a>";

    // }
    // function pimpinan()   
    // {
    //     echo "Hallo, selamat datang";
    //     //echo "<h1>" . Auth::user()->name . "</h1>"; 
    //     echo "<a href='/logout'>Logout >></a>";

    // }
}
