@extends('layouts.app')

@section('titulo')
        Editar Pefil: {{auth()->user()->username}}
@endsection

@section('contenido')
 <div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
        <form class="mt-10 md:mt-0" method="POST" action="{{route('perfil.store')}}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-blod">
                    Username
                </label>
                
                <input type="text"
                        id="username"
                        name="username"
                         placeholder="Tu nombre de usuario"
                        value="{{auth()->user()->username}}"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                       
                        />
                @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg p-2 text-center">{{$message}}</p>
                @enderror
            </div>


            <div class="mb-5">
                <label for="imagen" class="mb-2 block uppercase text-gray-500 font-blod">
                    Imagen Perfil
                </label>
                
                <input type="file"
                        id="imagen"
                        name="imagen"
                        class="border p-3 w-full rounded-lg"
                        accept=".jpg, .jpeg, .png"
                        />
            </div>
            
            <input type="submit" value="GuardarCambios" class="bg-sky-600 hover:bg-sky-700 transition-colors curor-pointer uppercase font-blood w-full p-3  text-white rounded-lg">


        </form>
    </div>
 </div>
@endsection
