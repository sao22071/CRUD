<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creacion de Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('dashboard.partials.validation-error')
                    <form action="{{ route('usuarios.store') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name">Nombre:</label>
                            <div class="col-sm-5">
                                <input type="text" name='name' id="name" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email">Email:</label>
                            <div class="col-sm-5">
                                <input type="text" name='email' id="email" class="form-control"
                                    value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password"> Password</label>
                            <div class="col-sm-5">
                                <input type="password" name='password' id='password' class="form-control"
                                    value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="confirm-password"> Confirmar Password</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name='confirm-password'
                                    id='confirm-password' value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="description">Rol</label>
                            <div class="col-sm-5">
                                <select name="roles" id="roles">
                                    <option value="">Seleccionar rol</option>

                                    @foreach ($roles as $id => $rol)
                                        <option value="{{ $id }}">{{ $rol }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row center">
                            <div class="col s6">
                                <button class="btn btn-success btn-sm" type="submit">Guardar</button>
                                <a href="{{ url('usuarios') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
