<x-layouts.app title="Crear nuevo post" meta-description="Formulario para crear un nuevo blog post">

    <h1>Create new post</h1>

    

    <form action="{{ route('posts.store') }}" method="POST">

        @csrf <!-- agregar esta directiva cada vez que usemos method="POST"-->

        <label>
            Title <br>
            <input name="title" type="text" value="{{ old('title')}}"><!-- old mantiene el mensaje si  queda alguno por cubrir y se intenta enviar, mantiene lo escrito-->
            @error('title')
            <br>
                <small style="color: red">{{ $message}}</small> <!-- $message solo está disponible dentro de cada error-->
            @enderror
        </label><br>

        <label>
            Body<br>
            <textarea name="body">{{old('body')}}</textarea>
        </label>
        @error('body')
        <br>
            <small style="color: red">{{ $message}}</small>
        @enderror
        <br>
        <button type="submit">Enviar</button>
        <br>

    </form>
    <br>

    <a href="{{ route('posts.index')}}">Regresar</a>
</x-layouts.app>