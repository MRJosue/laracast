<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user(){

        // para seleccionar la info deseada hay que agregar select
        //return $this ->belongsTo(User::class);
        return $this ->belongsTo(User::class)->select(['id','name', 'username']);
    }

    public function comentarios(){
        return $this ->hasMany(Comentario::class);
        
    }

    public function likes(){
        //
        return $this -> hasMany(like::class);
    }

    public function checkLike(User $user){
        return $this->likes->contains('user_id', $user->id);
    }
}
