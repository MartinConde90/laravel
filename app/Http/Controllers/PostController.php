<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        /*
        php artisan migrate - EN TERMINAL PARA CREAR LA BASE DE DATOS
        php artisan make:migration create_posts_table - CREA NUEVA TABLE DESPUES DE VOLVER A EJECUTAR -> php artisan migrate
        php artisan make:migration add_body_to_posts_table - crea nueva miagracion para añadir columnas a la tabla "posts" ya la coge del nombre en el comando y de nuevo -> php artisan migrate
        php artisan make:mode Post -m -> crearia la tabla posts y el modelo Post, algo que hicimos individualmente
            $posts = [
                ['title' => 'First post'],
                ['title' => 'Second post'],
                ['title' => 'Third post'],
                ['title' => 'Fourth post'],
            ];
        */
            //$posts = DB::table('posts')->get();
            
            $posts = Post::get(); // clase Post de  Models.Post.php, y no hace falta decirle que tabla a de coger, explicado en el propio archivo
            return view('posts.index',['posts' => $posts]);
        
    }

    public function show(Post $post){
       // return Post::findOrFail($post); - encontrar o mostrar error lo ahce de manera automatica con el Post dentro de los parametros
       return view('posts.show', ['post' => $post]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){//para recuperar los datos del formulario

        $request->validate([
            'title' => ['required','min:4'], //es como poner required en el input, pero asi evitamos que lo puedan quitar con f12
            'body' => ['required']
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        session()->flash('status', 'Post created!');

        return to_route('posts.index'); //es lo mismo que redirect()->route('posts.index');
    }
}
