<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index(){
        
        return view('auth.login');
    }

    public function login(Request $request){
        
        $this->validate($request,[

            'email' => 'required|email',
            'password' => 'required',
        ],

        );

        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('mensaje','Datos Incorrectos');
        }

        return redirect()->route('post.home',['user'=>auth()->user()->usuario]);
    }
}
