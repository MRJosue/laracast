<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;



class PerfilController extends Controller
{

        //comprobacion para la autenticacion
    public function __construct(){
        $this-> middleware('auth');
    }

    public function index(){
        return view('perfil.index');
    }

    public function store(Request $request)
    {

        //modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        // validar
        $this->validate($request,[
            'username'=>['required','unique:users,username,'.auth()->user()->id,'min:3','max:20','not_in:twitter,editar-perfil'],
           ]);

        // valida imagen

        if ($request->imagen) {

            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid(). "." . $imagen->extension();
            
            //
            $imagenServidor = Image::configure(['driver' => 'Gd']);
    
            $imagenServidor = Image::make($imagen);
    
             $imagenServidor -> fit(1000, 1000);
            
            // // movemos imagen 
       
            $imagenPath = public_path('perfiles').'/'.$nombreImagen;
    
            $imagenServidor -> save($imagenPath);
            
        }

        // Guardar cambios

        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen =  $nombreImagen ?? '';
        $usuario ->save();

        //Redireccionamos

        return redirect()->route('posts.index', $usuario->username);
    }
}
