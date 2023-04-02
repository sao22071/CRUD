@extends('dashboard.master')
@section('titulo', 'EditarCategoria')
@section('contenido')
    @include('dashboard.partials.validation-error')
    <h1>Editar Categoria</h1>
    <form action="{{ url('dashboard/category/' . $category->id) }}" method="POST">
        @method('PUT')
        @csrf
        <main>
            <div class="row">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
                </div>
                <div class="row form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $category->description }}</textarea>
                </div>
                {{-- <div class="row form-group">
                    <label for="description">Categoria</label>
                    <select name="category" id="category">
                        <option value="">
                            Selecciona una categoria
                        </option>
                        @foreach ($category as $category)
                            <option value="{{ $category->id }}"
                                @if ($category->id == $category->category_id) {{ 'selected' }} @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select> --}}
            </div>
            <div class="row center">
                <div class="col s6">
                    <button class="btn btn-success btn-sm" type="submit">Guardar</button>
                    <a href="{{ url('dashboard/category') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                </div>

            </div>
            </div>
        </main>
    </form>

@endsection
