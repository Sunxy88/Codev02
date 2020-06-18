<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(Request $request) {
        if (DemandController::validateLoginState($request)!=null)
            return redirect()->action("DemandController@manage");
        return view('login');
    }
    public function login(Request $request) {
        $validatedData = $request -> validate([
            'email' => ['bail', 'required', 'e-mail'],
            'pwd' => ['required', 'between:6,14'] // length of password should between 6 and 14, and consisted of letters or numbers or dashes('_', '-')
        ]);
        $user = $this->getUserByMail($validatedData['email']);
        if ($user == null || $user->password != $validatedData['pwd']) {
            $request->session()->flash('alert', 'User does not exist or password incorrect');
            return view('login');
        }
        $request -> session() -> put('user', $user);
        return redirect()->action("DemandController@manage");
    }

    public function logout(Request $request) {
        $user = DemandController::validateLogInState($request);
        if ($user == null)
            return view('login');
        $request->session()->forget('user');
        return view('login');
    }

    public function register(Request $request) {
        $validatedData = $request -> validate([
            'username' => ['bail', 'required', 'between:6,14', 'alpha_dash'],
            'email' => ['bail', 'required', 'e-mail'],
            'pwd' => ['required', 'between:6,14', 'alpha_dash'] // length of password should between 6 and 14, and consisted of letters or numbers or dashes('_', '-')
        ]);
        $user = $this->getUserByMail($validatedData['email']);
        if ($user != null) {
            $request->session()->flash('alert', 'Email have already been registered');
            return view('register');
        }
        $user = new User();
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['pwd'];
        $user->save();
        $request->session()->put('user', $user);
        return redirect('/manage');
    }

    private function getUserByMail($email) {
        return User::where("email", $email)->first();
    }
}
