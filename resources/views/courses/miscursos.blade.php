<x-app-layout>
    {{-- @livewire('course-miscursos') --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-6 pt-12">
        <h1 class="text-2xl font-semibold mb-4">Mis cursos matriculados</h1>


        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <li class="overflow-hidden">

                @foreach ($courses as $course)
               
                <article class="card1 cardEfect  efect:hover">
                    <img class="h-36 w-full object-cover" src=" {{ Storage::url($course->image->url) }}" alt="">
                    <div class="card-body">
                        <h1 class="card-title">{{ Str::limit($course->title, 40) }}</h1>
                        <p class="text-gray-500 text-sm mb-2"> Prof: {{ $course->teachers->name }}</p>
                        <div class="flex">
                            <ul class="flex text-sm">
                                <li class="mr-1"><i class="fas fa-star"
                                        style="color:{{ $course->rating >= 1 ? 'yellow' : 'gray' }};"></i>
                                </li>
                                <li class="mr-1"><i class="fas fa-star"
                                        style="color:{{ $course->rating >= 2 ? 'yellow' : 'gray' }};"></i>
                                </li>
                                <li class="mr-1"><i class="fas fa-star"
                                        style="color:{{ $course->rating >= 3 ? 'yellow' : 'gray' }};"></i>
                                </li>
                                <li class="mr-1"><i class="fas fa-star"
                                        style="color:{{ $course->rating >= 4 ? 'yellow' : 'gray' }};"></i>
                                </li>
                                <li class="mr-1"><i class="fas fa-star"
                                        style="color:{{ $course->rating == 5 ? 'yellow' : 'gray' }};"></i>
                                </li>
                            </ul>
                
                            <p class="text-sm text-gray-500 ml-auto">
                                <i class="fas fa-users"></i>
                                ({{ $course->students_count }})
                            </p>
                        </div>
                        <a href="{{ route('courses.show', $course) }}"
                            class="w-full block text-center mt-4 btn btn-primary">
                            Más información
                        </a>
                    </div>
                </article>
            </li>

            @endforeach
        </ul>
        @include('components.footer')
    </div>
</x-app-layout>
