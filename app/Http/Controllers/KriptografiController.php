<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class KriptografiController extends Controller
{
    public function zigzagCipher()
    {
        return view('layout.kriptografi.zigzag')->with('users', Auth::user());

    }

    public function atbashCipher()
    {
        return view('layout.kriptografi.atbash')->with('users', Auth::user());

    }

    public function shiftCipher()
    {
        return view('layout.kriptografi.shift')->with('users', Auth::user());

    }

    public function vigenereCipher()
    {
        return view('layout.kriptografi.vigenere')->with('users', Auth::user());

    }

}
