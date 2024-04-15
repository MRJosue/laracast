@extends('layouts.app')

@section('titulo')
        {{ $post ->titulo}}
@endsection


@section('contenido')

    <div class="container mx-auto md:flex">
        <div class="md:w-1/2 p-4">
            <img src="{{asset('uploads').'/'.$post->imagen}}" alt="Imagen del post {{$post->titulo}}">

            <div class="p-3 flex items-center gap-4">

                @auth


                    <livewire:like-post :post="$post" />


                @endauth

               
            </div>

            <div>
                <p class="font-blod"> {{$post->user->username}}</p>
                <p class="font-blod  text-gray-500"> {{$post->created_at->diffForHumans()}}</p>
                <p class="mt-5 p-1"> {{$post->descripcion}}</p>
            </div>

            @auth  

                @if ($post->user_id === auth()->user()->id)
                <form method="POST" action="{{route('posts.destroy',$post)}}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Eliminar Publicacion" class= "bg-red-500 hover:bg-red-600 text-white font-bold mt-4 p-2 cursor-pointer rounded-md"/>
                </form> 
                @endif


            @endauth


        </div>
        <div class="md:w-1/2 p-5">

        
                <div class="shadow bg-white p-5 mb-5 ">

                    @auth

                    <p class="text-xl font-bold text-center mb-4"> Agrega un nuevo comentario</p>

                    @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center-uppercase font-bold">
                            {{session('mensaje')}}
                        </div>
                    @endif        
                

                    <form  action="{{route('comentarios.store',['post' =>$post,'user' => $user])}}" method="POST">
                        @csrf
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-blod">
                            Añade un Comentario
                        </label>
                        
                        <textarea 
                                cols="30" 
                                rows="10"
                                id="comentario"
                                name="comentario"
                                placeholder="comentario"
                                class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror">
                                {{old("comentario")}}
                                </textarea>
                        @error('comentario')
                        <p class="bg-red-500 text-white my-2 rounded-lg p-2 text-center">{{$message}}</p>
                        @enderror
                            
                        <input type="submit" value="Comentar" class="bg-sky-600 hover:bg-sky-700 transition-colors curor-pointer uppercase font-blood w-full p-3  text-white rounded-lg">


                    </form>

                    @endauth


                </div>  

                <div class=" mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post ->comentarios->count())
                        @foreach ($post ->comentarios as $comentario)
                        <div class="shadow border-gray-300 border-b bg-white p-5 mb-6">
                                
                            <p class="font-bold">
                                    <a href="{{route('posts.index',$comentario->user->username)}}">{{$comentario->user->username}}</a>
                                </p>

                                <p>{{$comentario -> comentario}}</p>
                                
                                <p class="text-sm text-gray-500">{{$comentario ->created_at->diffForHumans()}}</p>
                        </div>  
                        @endforeach
                    @else

                    <p class="p-10 text-center"> Sin Comentarios </p>
                        
                    @endif

                </div>
           
        </div>
     
    </div>
       
@endsection