<?php
//php artisan make:mode Post creacion de este archivo desde consola
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model //como la clase se llama Post, se asume que la tabla se llama posts, por eso la clase ha de ser en singular
{
    use HasFactory;
}
