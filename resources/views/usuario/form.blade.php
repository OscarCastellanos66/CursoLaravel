@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        
    @if (isset($usuario))
            <h1>Editar Usuario</h1>
        @else
            <h1>Crear Usuario</h1>
        @endif        

        @if (isset($usuario))
            <form class="needs-validation" action="{{ route('usuario.update', $usuario)}}" method="post" novalidate>
                @method('PUT')
        @else
            <form class="needs-validation" action="{{ route('usuario.store')}}" method="post" novalidate>
        @endif 
        
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{old('nombre') ?? @$usuario->nombre}}" required>

                <p class="invalid-feedback">El campo nombre es obligatorio.</p>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email') ?? @$usuario->email}}" required>

                <p class="invalid-feedback">El campo email es obligatorio.</p>
            </div>

            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="password" name="contraseña" class="form-control" placeholder="contraseña" value="{{old('contraseña') ?? @$usuario->contraseña}}" required>

                <p class="invalid-feedback">El campo contraseña es obligatorio.</p>
            </div>
            
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control" placeholder="Activo/Inactivo" value="{{old('estado') ?? @$usuario->estado}}" required>
                
                <p class="invalid-feedback">El campo estado es obligatorio.</p>
                
            </div>

            @if (isset($usuario))
                <button type="submit" class="btn btn-success">Editar usuario</button>
                <a href="{{ route('usuario.index') }}" class="btn btn-danger">Regresar</a>
            @else
                <button type="submit" class="btn btn-success">Guardar usuario</button>
                <a href="{{ route('usuario.index') }}" class="btn btn-danger">Regresar</a>
            @endif  

        </form>

    </div>
@endsection