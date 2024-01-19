<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card">
                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo" class="block font-medium text-sm text-gray-700 mb-2">Título</label>
                                   <input type="text" name="titulo" value="{{$blog->titulo}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                    
                                <div class="form-floating mt-3">
                                <textarea class="form-control" name="contenido" style="height: 100px">{{$blog->contenido}}</textarea>
                                <label for="contenido" class="block font-medium text-sm text-gray-700">Contenido</label>
                                </div>
                            
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-3">Guardar</button>                            
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>