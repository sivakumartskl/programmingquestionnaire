<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function registerUser(Request $request) {

        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

    	$newUser = new User();
    	$newUser->username = $request['username'];
    	$newUser->email = $request['email'];
    	$newUser->password = bcrypt($request['password']);

    	$newUser->save();

    	Auth::login($newUser);

        return redirect()->route('home');
    }

    public function authenticateUser(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('home');
        }
        return redirect()->back();
    }

    public function logoutUser() {
        Auth::logout();

        return redirect('/');
    }
}
