@extends('dashboard.master')
@section('titulo', 'EditarPost')
@section('contenido')
    @include('dashboard.partials.validation-error')
    <h1>Editar Post</h1>
    <form action="{{ url('dashboard/post/' . $post->id) }}" method="POST">
        @method('PUT')
        @csrf
        <main>
            <div class="row">
                <div class="form-group">
                    <label for="name">Articulo</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $post->name }}">
                </div>
                <div class="row form-group">
                    <label for="description">Contenido</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $post->description }}</textarea>
                </div>
                <div class="row form-group">
                    <label for="description">Categoria</label>
                    <select name="category" id="category">
                        <option value="">
                            Selecciona una categoria
                        </option>
                        @foreach ($category as $category)
                            <option value="{{ $category->id }}"
                                @if ($category->id == $post->category_id) {{ 'selected' }} @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="row center">
                    <div class="col s6">
                        <button class="btn btn-success btn-sm" type="submit">Guardar</button>
                        <a href="{{ url('dashboard/post') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                    </div>

                </div>
            </div>
        </main>
    </form>

@endsection
