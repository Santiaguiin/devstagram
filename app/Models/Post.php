<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    
    
    public function user() 
    {
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

    // un post tiene multiples comentarios
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    // un post tiene multiples likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //verificar si un usuario ya le dio me gusta a un post
    public function checkLike(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
