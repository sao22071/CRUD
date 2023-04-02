@extends('dashboard.master')
@section('titulo', 'Poster')
@section('contenido')
    <main>
        <div class="container py-4">
            <h2>Post Publicados</h2>
            <a href="{{ url('dashboard/post/create') }}" class="btn btn-primary btn-sm">
                Nuevo Post
            </a>
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Estado</th>
                    <th>Fecha de creacion</th>
                    <th>Fecha de modificacion</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->state }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td><a href="{{ url('dashboard/post/' . $post->id . '/edit') }}" method="post" class="bi bi-pencil">
                            </a></td>
                        <td>
                            <form action="{{ url('dashboard/post/' . $post->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="bi bi-eraser-fill" type="submit"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
