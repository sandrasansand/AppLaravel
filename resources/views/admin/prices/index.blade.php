@extends('adminlte::page')
@section('title', 'App Cursos')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.prices.create') }}">Nuevo Precio</a>
    <h1>Lista de Precios</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Valor</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prices as $price)
                        <tr>
                            <td>
                                {{ $price->id }}
                            </td>
                            <td>
                                {{ $price->name }}
                            </td>
                            <td width="10px"><a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.prices.edit', $price) }}">Editar</a></td>
                            <td width="10px">
                                <form action="{{ route('admin.prices.destroy', $price) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
