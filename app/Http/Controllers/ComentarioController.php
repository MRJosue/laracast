<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class ComentarioController extends Controller
{
    public function store(Request $request,User $user,Post $post){
       // validacion 
        $this -> validate($request,[
            'comentario' => 'required||max:255',
        ]);

        //dd($user->id);
        // dd(auth()->user()->id);
        //dd($request->comentario);

        Comentario::create([
            'user_id'=> auth()->user()->id,
            'post_id'=> $post->id,
            'comentario' => $request->comentario
        ]);

        // Mensaje
        return back()->with('mensaje','Comentario realizado correctamente');
    }
}
