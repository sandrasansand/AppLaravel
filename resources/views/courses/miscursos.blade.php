<x-app-layout>
    {{-- @livewire('course-miscursos') --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-6 pt-12 pb-12">
        <h1 class="text-2xl font-semibold mb-4 text-gray-800">Mis cursos matriculados</h1>

        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <li class="overflow-hidden">

                @foreach ($coursesUser as $course)
                    <article class="card ">
                        <img class="h-36 w-full object-cover" src="{{ asset('img/cursos/people.jpg') }} " alt="">
                        <div class="card-body">
                            <h1 class="card-title">{{ Str::limit($course->title, 40) }}</h1>
                            <p class="text-gray-500 text-sm mb-2"> {{Str::limit( $course->description,45 )}}</p>

                            <a href="{{ route('courses.show', $course->slug) }}"
                                class="w-full block text-center mt-4 btn btn-primary">
                                Más información
                            </a>
                            {{-- <h1>id_course: {{ $course->id }}</h1> --}}

                        </div>
                    </article>
            </li>
            @endforeach
        </ul>
       
    </div>
    @include('components.footer')
</x-app-layout>
