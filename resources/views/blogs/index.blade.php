<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="card">
  <div class="table-responsive text-nowrap">
    @can('crear-blog')
    <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-sm"">Crear nuevo post</a>
    @endcan
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Contenido</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($blogs as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->titulo}}</td>
                <td>{{$post->contenido}}</td>
                <td>
                  @can('editar-blog')
                    <a class="btn btn-warning" href="{{ route('blogs.edit', $post->id) }}"> Editar</a>
                  @endcan  
                    <form action="{{route('blogs.destroy', $post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        @can('borrar-blog')
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