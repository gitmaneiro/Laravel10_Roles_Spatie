<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Usuario') }}
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

                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nombre Completo</label>
                            <input type="text" name="name" class="form-control" id="nombre" placeholder="Administrador" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Email</label>
                            <div class="input-group input-group-merge">
                                <input type="text" name="email" id="email" class="form-control" placeholder="@example.com" aria-label="john.doe" aria-describedby="basic-default-email2" />
                                <span class="input-group-text" id="basic-default-email2">@example.com</span>
                            </div>
                            <div class="form-text"> You can use letters, numbers & periods </div>
                        </div>
                        <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña secreta" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tipo">Rol</label>
                            <select class="form-control selectpicker w-100 show-tick" id="rol" name="rol" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                                @foreach($roles as $rol)
                                    <option value="{{$rol}}" >{{$rol}}</option>
                                @endforeach
                            </select>
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