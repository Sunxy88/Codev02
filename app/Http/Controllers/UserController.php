<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addSession(Request $request) {
        $request->session()->put('userid', 1);
        return view('demande');
    }

    public function login(Request $request) {
        $validatedData = $request -> validate([
            'email' => ['bail', 'required', 'e-mail'],
            'pwd' => ['required', 'between:6,14', 'alpha_dash'] // length of password should between 6 and 14, and consisted of letters or numbers or dashes('_', '-')
        ]);
        $user = User::where("email", $validatedData['email'])->first();
        if ($user == null || $user->password != $validatedData['pwd']) {
            $request->session()->flash('alert', 'User does not exist or password incorrect');
            return view('login');
        }
        $request -> session() -> put('user', $user);
        return redirect()->action("DemandController@manage");
    }
}
