@extends('layouts.app')

@section('titulo')
    Registrate en devstagram
@endsection


@section('contenido')

    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-6 ">
            <img src="{{ asset('img/1691252234464569.PNG') }}" alt="Imagen Registro Usuarios" class="rounded-xl">
        </div>

        <div class="md:w-4/12  bg-white shadow p-5 rounded-xl">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-blod">
                        Nombre
                    </label>
                    
                    <input type="text"
                            id="name"
                            name="name"
                             placeholder="Nombre"
                             
                            class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                           
                            value="{{old("name")}}"
                            />
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg p-2 text-center">{{$message}}</p>
                    @enderror


                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-blod">
                        Nombre de usuario
                    </label>
                    
                    <input type="text"
                            id="username"
                            name="username"
                             placeholder="Nombre de usuario"
                             class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                             value="{{old("username")}}"
                               />
                    @error('username')
                     <p class="bg-red-500 text-white my-2 rounded-lg p-2 text-center">{{$message}}</p>
                    @enderror


                </div>

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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-blod">
                        Pasword de Registro
                    </label>
                    
                    <input type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                             placeholder="password"
                             class="border p-3 w-full rounded-lg "/>
                </div>



                <input type="submit" value="CrearCuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors curor-pointer uppercase font-blood w-full p-3  text-white rounded-lg">

            </form>

        </div>

    </div>

@endsection