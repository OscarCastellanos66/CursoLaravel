@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1>Menú</h1>
        <a href="{{ route('usuario.index') }}" class="btn btn-outline-primary">Ver Usuarios</a>
    </div>
@endsection