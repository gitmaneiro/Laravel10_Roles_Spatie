<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="card">
  <div class="table-responsive text-nowrap">
    @can('crear-rol')
  <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm"">Crear nuevo rol</a>
    @endcan
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Rol</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($roles as $rol)
            <tr>
                <td>{{$rol->id}}</td>
                <td>{{$rol->name}}</td>
                <td>
                    <form action="{{route('roles.destroy', $rol->id)}}" method="POST">
                        @can('editar-rol')
                        <a class="btn btn-warning" href="{{ route('roles.edit', $rol->id) }}"> Editar</a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('borrar-rol')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>