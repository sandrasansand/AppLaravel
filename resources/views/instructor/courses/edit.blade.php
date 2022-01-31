<x-app-layout>
    <div class="container py-8 grid grid-cols-5 font-garmond">

        <aside>
            <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
            <ul class="text-sm text-gray-600">
                <li class="leding-7 mb-1 border-l-4 border-indigo-400 hover:text-amber-500 pl-2 "><a
                        href="">Información</a></li>
                <li class="leding-7 mb-1 border-l-4 border-transparent hover:text-amber-500 pl-2 " class="leding-7">
                    <a href="">Lecciones</a></li>
                <li class="leding-7 mb-1 border-l-4 border-transparent hover:text-amber-500 pl-2 "><a href="">Metas</a>
                </li>
                <li class="leding-7 mb-1 border-l-4 border-transparent hover:text-amber-500 pl-2 "><a
                        href="">Estudiantes</a></li>
            </ul>
        </aside>
        <div class="col-span-4 card">
            <div class="card-body text-gray-600">
                <h1 class="font-bold text-2xl uppercase">Información del Curso</h1>
                <hr class="mt-2 mb-6">

                {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}

                @include('instructor.courses.partials.form')

                <div class="flex justify-end">
                    {!! Form::submit('Actualizar información', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

            </div>

        </div>
    </div>

    <x-slot name='js'>
        <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}">
           
        </script>
    </x-slot>
</x-app-layout>
