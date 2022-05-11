@extends('adminlte::page')
@section('title', 'App Cursos')

@section('content_header')
    <h1>Editar Precio</h1>
@stop
@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($price, ['route' => ['admin.prices.update', $price], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre del Precio']) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('value', 'Valor') !!}
                {!! Form::number('value', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el valor del Precio']) !!}

                @error('value')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            {!! Form::submit('Actualizar Precio', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
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
