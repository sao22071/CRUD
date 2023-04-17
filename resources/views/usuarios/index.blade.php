<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @can('crear-usuarios')
                        <a href="{{ url('usuarios/create') }}" class="btn btn-primary btn-sm">Nuevo usuario</a>
                    @endcan
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>E-mail</th>
                                <th>Rol</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        @if (!empty($usuario->getRoleNames()))
                                            @foreach ($usuario->getRoleNames() as $rolName)
                                                <h5>{{ $rolName }}</h5>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @can('edit-usuarios')
                                            <a href="{{ url('usuarios/' . $usuario->id . '/edit') }}" class="bi bi-pencil"></a>
                                        @endcan

                                    </td>
                                    <td>
                                        @can('borrar-usuarios')
                                            <form action="{{ url('usuarios/' . $usuario->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="bi bi-eraser-fill" type="submit"></button>
                                            </form>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
