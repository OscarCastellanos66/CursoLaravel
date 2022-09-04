@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1>Listado de usuarios</h1>
        
        <a href="{{ route('usuario.create') }}" class="btn btn-primary">Crear Usuario</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('mensaje')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    
    <div class="shadow p-3 mb-5 bg-body rounded-3 container py-5 text-center">
        
        <table class="table display nowrap" cellspacing="0" width="100%">
            <thead class="bg-dark text-white">
                <th>Nombre</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($usuarios as $detail)
                    <tr>
                        <td>{{$detail->nombre}}</td>
                        <td>{{$detail->email}}</td>
                        <td>{{$detail->contraseña}}</td>
                        <td>{{$detail->estado}}</td>
                        <td>
                            <a href="{{route('usuario.edit',$detail)}}" class="btn btn-warning">Editar</a>

                            <form action="{{ route('usuario.destroy', $detail) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Esta seguro de eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="5">NO HAY REGISTROS</td>
                @endforelse           
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            @if ($usuarios->count())
                {{$usuarios->links()}}
            @endif
        </div>        
    </div>
@endsection