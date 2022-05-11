@extends('adminlte::page')
@section('title', 'App Cursos')

@section('content_header')
    <h1>Observacionesy notas del curso: <span class="">{{ $course->title }}</span></h1>
@stop

@section('content')



    <div class="card">
        <div class="card_body">

            {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
            <div class="form-group">
                {!! Form::label('body', 'Observaciones del curso') !!}
                {!! Form::textarea('body', null) !!}
            </div>
            @error('body')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
            {!! Form::submit('Rechazar curso', ['class' => 'btn btn-primary m-2']) !!}
            {!! Form::close() !!}
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@stop
