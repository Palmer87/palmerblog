<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }


    public function dologin(AuthRequest $request){

       $credentials=$request->validated();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('blog.index'));
        }
        return to_route('login')->withErrors([
            'email'=>'l\'email ou le mot de passe est incorrect'
        ])->onlyInput('email');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('login');
    }


}
