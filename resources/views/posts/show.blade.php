<x-layouts.app :title="$post->title" :meta-description="$post->body">
    <h1>{{$post->title}}</h1>
    <h1>{{$post->body}}</h1>
    <a href="{{ route('posts.index')}}">Regresar</a>
</x-layouts.app>