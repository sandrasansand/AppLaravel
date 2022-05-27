<x-app-layout>
    <section class="bg-gray-700 py-12 mt-16 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @if ($course->image)
                    <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                @else
                    <img id="picture" class="w-full h64 object-cover object-center"
                        src="https://images.pexels.com/photos/735911/pexels-photo-735911.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
                        alt="">
                @endif
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{ $course->title }}</h1>
                <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-chart-line mr-2"></i>Nivel: {{ $course->level->name }}</p>
                <p class="mb-2"><i class=""></i>Categoría: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users mr-2"></i>Matriculados: {{ $course->students_count }}
                </p>
                <p><i class="fas fa-star mr-2"></i>Calificación: {{ $course->rating }}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        @if (session('info'))
            <div class="lg:col-span-4" x-data="{open:true}" x-show="open">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Ocurrió un error! </strong>
                    <span class="block sm:inline">{{ session('info') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg x-on:click="open=false" class="fill-current h-6 w-6 text-red-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            </div>
        @endif

        <div class="order-2 lg:col-span-2 lg:order-1">
            {{-- objetivos --}}
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderás</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">

                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i
                                    class="fas fa-check text-gray-600 mr-2"></i>{{ $goal->name }}</li>
                        @empty
                            <li class="text-gray-700 text-base">Por el momento este curso no tiene asignados los
                                objetivos
                                principales del mismo.</li>
                        @endforelse

                    </ul>
                </div>
            </section>
            {{-- temario --}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2">Temario</h1>

                @forelse ($course->sections as $section)
                    <article class="mb-4 shadow"
                        @if ($loop->first) x-data={open:true}
                    @else
                        x-data={open:false} @endif>
                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200"
                            x-on:click='open = !open'>
                            <h1 class="font-bold text-lg text-gray-600">{{ $section->name }}</h1>
                        </header>
                        <div class="bg-white py-2 px-4" x-show='open'>
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray text-base"> <i
                                            class="fas fa-play-circle mr-2 text-gray-600"></i>{{ $lesson->name }}
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </article>
                @empty
                    <article class="card">
                        <div class="card-body">
                            Por el moemento este curso no tiene ninguna sección asignada.
                        </div>
                    </article>
                @endforelse
            </section>
            {{-- requerimientos --}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2">Requisitos:</h1>
                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{ $requirement->name }}</li>
                    @empty
                        <li class="text-gray-700 text-base">Por el momento este curso no tiene Requisitos asignados.
                        </li>
                    @endforelse
                </ul>
            </section>

            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2">Descripción:</h1>
                <div class="text-gray-700 text-base">
                    {!! $course->description !!}

                </div>
            </section>

        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                            src="{{ $course->teachers->profile_photo_url }}" alt="{{ $course->teachers->name }}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg ">Instr.{{ $course->teachers->name }}</h1>
                            <a class="text-blue-400 text-sm font-bold"
                                href="">{{ '@' . Str::slug($course->teachers->name, '') }}</a>
                        </div>
                    </div>

                    <form action="{{ route('admin.courses.approved', $course) }}" class="mt-4"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-full">Aprobar Curso</button>
                    </form>
                        <a href="{{route('admin.courses.observation', $course)}}" class="btn btn-danger w-full text-center block mt-4">Revisar Curso </a>
                </div>

            </section>


        </div>
    </div>
    {{-- @include('components.footer') --}}
</x-app-layout>
