@props(['course'])

<article class="card1 cardEfect  efect:hover mb-10">
    <img class="h-36 w-full object-cover" src=" {{ Storage::url($course->image->url) }}" alt="">
    <div class="card-body flex-1 flex-col">
        <h1 class="card-title">{{ Str::limit($course->title, 40) }}</h1>
        <p class="text-gray-500 text-sm mb-2 mt-auto"> Prof: {{ $course->teachers->name }}</p>
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
        @if ($course->price->value == 0)
            <p class="text-green-600 font-bold my-2">
                Gratis
            </p>
        @else
            <p class="text-gray-500 font-bold my-2">
                {{ $course->price->value }} €
            </p>
        @endif




        <a href="{{ route('courses.show', $course) }}" class="w-full block text-center mt-2 btn btn-primary">
            Más información
        </a>

    </div>
</article>
