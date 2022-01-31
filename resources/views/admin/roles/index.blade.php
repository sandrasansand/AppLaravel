@extends('adminlte::page')
@section('title', 'App Cursos')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success" role="alert">
    <strong>Éxito! </strong>{{session('info')}}
</div>
  
@endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.roles.create') }}">Crear Rol</a>
        </div>
        <div class="card body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="10px"><a class="btn btn-secondary " href="{{ route('admin.roles.edit', $role) }}">Editar</a></td>

                            <td width="10px">
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay ningún rol registrado</td>
                        </tr>
                    @endforelse

                </tbody>

            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
