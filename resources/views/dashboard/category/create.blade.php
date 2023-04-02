@extends('dashboard.master')
@section('titulo', 'AgregarPost')
@section('contenido')
    @include('dashboard.partials.validation-error')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <main>
            <div class="container py-4">
                <h1>Registrar Categoria</h1>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="row form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>
                <div class="row center">
                    <div class="col s6">
                        <button class="btn btn-success btn-sm" type="submit">Publicar</button>
                        <a href="{{ url('dashboard/category') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                    </div>

                </div>
            </div>
        </main>
    </form>

@endsection
