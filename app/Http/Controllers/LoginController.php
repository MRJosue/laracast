<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    // se agrega el metdodo store

    public function store(Request $request)
    {
       $this->validate($request,[
        'email'=>'required|email',
        'password'=>'required',
       ]);

       if (!auth()->attempt($request->only('email','password'), $request->remember)) {
            // Esto se guarda en secion  
            return back()->with('mensaje','Credenciales Incorrectas');
       }

       return redirect()->route('posts.index', auth()->user() ->username);

    }


}
