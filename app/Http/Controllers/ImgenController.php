<?php



namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImgenController extends Controller
{

    
    public function store(Request $request){

        

        $imagen = $request->file('file');

        $nombreImagen = Str::uuid(). "." . $imagen->extension();
        
        //
        $imagenServidor = Image::configure(['driver' => 'Gd']);

        $imagenServidor = Image::make($imagen);

         $imagenServidor -> fit(1000, 1000);
        
        // // movemos imagen 
   
        $imagenPath = public_path('uploads').'/'.$nombreImagen;

        $imagenServidor -> save($imagenPath);


        return response()->json(['imagen'=>$nombreImagen]);
    }

}

    

