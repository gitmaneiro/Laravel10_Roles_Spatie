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
  <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-sm"">Crear nuevo usuario</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Mombre</th>
          <th>Email</th>
          <th>Rol</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>
                    @if(!empty($usuario->getRoleNames()))
                        @foreach($usuario->getRoleNames() as $rolName)
                            <h5><span class="badge bg-dark">{{$rolName}}</span></h5>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-warning" href="{{ route('usuarios.edit', $usuario->id) }}"> Editar</a>
                    <form action="{{route('usuarios.destroy', $usuario->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
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