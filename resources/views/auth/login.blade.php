@extends('layouts/app')

@section('titulo')
   Inicia secion en devstagram
@endsection


@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-6 ">
        <img src="{{ asset('img/1704370147666751.jpg') }}" alt="Imagen Registro Usuarios" class="rounded-xl">
    </div>

    <div class="md:w-4/12  bg-white shadow p-5 rounded-xl">
        <form method="POST" action="{{route('login')}}" novalidate>
            @csrf

            @if (session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg p-2 text-center">{{session('mensaje')}}</p>                
            @endif


            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-blod">
                    Email
                </label>
                
                <input type="email"
                        id="email"
                        name="email"
                         placeholder="Email"
                         class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                         value="{{old("email")}}"/>
                @error('email')
                 <p class="bg-red-500 text-white my-2 rounded-lg p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-blod">
                    Confirmacion de Pasword
                </label>
                
                <input type="password"
                         id="password"
                       name="password"
                      placeholder="password"
                         class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                         
                         />
                         @error('password')
                         <p class="bg-red-500 text-white my-2 rounded-lg p-2 text-center">{{$message}}</p>
                        @enderror
            </div>

            <div class="mb-5">
                
                <input type="checkbox" name="remember" id="remember"> <label for="remember" class=" text-gray-500 text-sm">
                    Mantener mi Sesion abierta
                </label> 
            </div>

            <input type="submit" value="Iniciar secion" class="bg-sky-600 hover:bg-sky-700 transition-colors curor-pointer uppercase font-blood w-full p-3  text-white rounded-lg">

        </form>

    </div>

</div>

@endsection