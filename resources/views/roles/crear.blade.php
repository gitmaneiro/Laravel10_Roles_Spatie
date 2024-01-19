<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Rol') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
        
                    </div>
                    <div class="card-body">

                     @if ($errors->any())                                                
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>¡Revise los campos!</strong>                        
                    @foreach ($errors->all() as $error)                                    
                        <span class="badge badge-danger">{{ $error }}</span>
                     @endforeach                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif

                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nombre del rol</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Administrador" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="block font-medium text-sm text-gray-700">Permisos para este Rol:</label>
                            @foreach($permission as $permiso)
                                <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" value="{{$permiso->id}}" name="permission[]" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">{{$permiso->name}}</label>
                                </div>
                            @endforeach
                        </div>
                            <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </form>


      </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>