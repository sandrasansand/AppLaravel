<x-instructor-layout :course="$course" > 
    {{-- <x-slot name="course">
        {{$course->slug}}
    </x-slot> --}}




        <h1 class="font-bold text-2xl uppercase mt-12">Información del Curso</h1>
        <hr class="mt-2 mb-6">

        {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}

        @include('instructor.courses.partials.form')

        <div class="flex justify-end">
            {!! Form::submit('Actualizar información', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    <x-slot name='js'>
        <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}">
           
        </script>
    </x-slot>
</x-instructor-layout>
{{-- @include('components.footer') --}}
