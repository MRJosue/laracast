<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        //modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);


        // validaciones
        $this->validate($request,[
            'name'=>'required|max:30',
            'username'=>'required|unique:users|min:3|max:20',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:3',
        ]);


        // Insert de usuario
        User::create([
            'name'=> $request->name,
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> Hash::make($request->password) 
        ]);

        // //autenticar
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password'=> $request->password
        // ]);

        // forma b de autenticar 
        auth()->attempt($request->only('email','password'));

        //Redireccionar 
        return redirect()->route('posts.index',auth()->user() ->username);


        
    }
}
