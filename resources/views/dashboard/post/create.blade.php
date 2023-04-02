@extends('dashboard.master')
@section('titulo', 'AgregarPost')
@section('contenido')
    @include('dashboard.partials.validation-error')
    <h1>Post Publicados</h1>
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <main>
            <div class="row">
                <div class="form-group">
                    <label for="name">Articulo</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="row form-group">
                    <label for="description">Contenido</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>
                <div class="row form-group">
                    <label for="description">Categoria</label>
                    <select name="category" id="category">
                        <option value="">
                            Selecciona una categoria
                        </option>
                        @foreach ($category as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row center">
                    <div class="col s6">
                        <button class="btn btn-success btn-sm" type="submit">Publicar</button>
                        <a href="{{ url('dashboard/post') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                    </div>

                </div>
            </div>
        </main>
    </form>

@endsection
