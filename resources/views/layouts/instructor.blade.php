<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">


    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-garmond">
    {{-- <x-jet-banner /> --}}

<div class="min-h-screen bg-gray-100">
    @livewire('navigation-menu')

        <!-- Page Content -->
    <div class="container py-8 grid grid-cols-5 md:grid-cols-1 gap-6 font-garmond mt-10">


        <aside>
                <h1 class="font-bold text-2xl mb-4">Edición del curso</h1>
                <ul class="text-lg text-gray-600 mb-4">
                    <li
                        class="leding-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-400 @else border-transparent @endif hover:text-amber-500 pl-2 ">
                        <a href="{{ route('instructor.courses.edit', $course) }}">Información</a>
                    </li>
                    <li class="leding-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif hover:text-amber-500 pl-2 "
                        class="leding-7">
                        <a href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones</a>
                    </li>
                    <li
                        class="leding-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) border-indigo-400 @else border-transparent @endif hover:text-amber-500 pl-2 ">
                        <a href="{{ route('instructor.courses.goals', $course) }}">Objetivos</a>
                    </li>
                    <li
                        class="leding-7 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) border-indigo-400 @else border-transparent @endif hover:text-amber-500 pl-2  ">
                        <a href="{{ route('instructor.courses.students', $course) }}">Estudiantes</a>
                    </li>

                    <li
                        class="leding-7 mb-1 border-l-4 @routeIs('instructor.courses.observation', $course) border-indigo-400 @else border-transparent @endif hover:text-amber-500 pl-2  ">
                        @if ($course->observation)
                            <a href="{{ route('instructor.courses.observation', $course) }}">Observaciones</a>
                    </li>
                </ul>
                @endif

                @switch($course->status)
                    @case(1)
                        <form action="{{ route('instructor.courses.status', $course) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">Revisión</button>
                        </form>
                    @break

                    @case(2)
                        <div class="card text-gray-500">
                            <div class="card-body">
                                Este curso se encuentra en el estado Revisión por parte del administrador
                            </div>
                        </div>
                    @break

                    @case(3)
                        <div class="card text-gray-500">
                            <div class="card-body">
                                Este curso se encuentra en el estado Publicado
                            </div>
                        </div>
                    @break

                    @default
                @endswitch


        </aside>
        <div class="col-span-4 card">
            <main class="card-body text-gray-600">
                    {{ $slot }}

            </main>

        </div>
    </div>
</div>

@stack('modals')
@stack('modals')
@stack('modals')

@livewireScripts

@isset($js)
 {{ $js }}
@endisset

</body>
@include('components.footer')

</html>
