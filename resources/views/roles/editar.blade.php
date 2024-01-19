<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Rol') }}
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

                
                    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="" class="block font-medium text-sm text-gray-700 mb-2">Nombre del Rol:</label>      
                                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <div class="form-group">
                                <label for="" class="block font-medium text-sm text-gray-700">Permisos para este Rol:</label>
                                <br/>
                                @foreach($permission as $value)
                                    <label class="block font-medium text-sm text-gray-700">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolPermission) ? true : false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br/>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="mt-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Guardar</button>
                        </div>
                        
                    </div>
                {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</x-app-layout>