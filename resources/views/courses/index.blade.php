<x-app-layout>
    {{-- Cursos --}}
    <section class="bg-cover" style="background-image: url({{ asset('img/cursos/people.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white text-5xl tracking-wider">Los mejores cursos ahora los tienes a tu alcance</h1>
                <p class="text-white text-xl mt-2 pb-4">Aprender a programar puede ser fácil, divertido y económico. Además puedes hacerlo con nosotros. </p>
                <!-- component -->
                @livewire('search')
            </div>
        </div>

    </section>

    @livewire('courses-index')
    @include('components.footer')
</x-app-layout>