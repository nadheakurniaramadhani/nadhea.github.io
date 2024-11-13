<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index(){
        return view('login');
    }
    function login(request $request){
        $request->validate([
        'email'=>'required',
        'password'=>'required'
        ],[
            'email.required'=>'Email wajib di isi',
            'password.required'=>'Password wajib di isi',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin') {
                return redirect ('admin');
            }elseif (Auth::user()->role == 'pimpinan'){
                return redirect ()->route('pimpinan');
            }elseif (Auth::user()->role == 'petugas') {
                return redirect ('petugas');
            }
        }else{
            return redirect('')->withErrors('Username dan password yang dimasukan tidak sesuai')->withInput();

        }
    }

    function logout(){
        Auth::logout();
        return redirect('/login');
    }
}

