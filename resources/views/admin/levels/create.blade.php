@extends('adminlte::page')
@section('title', 'App Cursos')

@section('content_header')
    <h1>App Cursos Online</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.levels.store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre del nuevo Nivel']) !!}

            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {!! Form::submit('Crear Nivel', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop