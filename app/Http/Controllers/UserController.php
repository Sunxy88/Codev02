<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addSession(Request $request) {
        $request->session()->put('userid', 1);
        return view('demande');
    }
}
