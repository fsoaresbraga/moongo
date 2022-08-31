<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Auth\LoginRequest;

class LoginController extends Controller
{
    public function index(){
        return view('Admin.Auth.login');
    }

    public function authenticate(LoginRequest $request){
        $req_valid = $request->validated();

        if (Auth::attempt(['email' => $req_valid['email'], 'password' => $req_valid['password'], 'status' => 1])){

            return redirect()->route('admin.dashboard');
        }

        return back()->with(config('messages.errorLogin'))->withInput();
    }

    public function logout () {

        Auth::logout();
        return redirect()->route('admin.login.index');
    }
}
