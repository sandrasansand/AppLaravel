<x-app-layout>
     <!-- Portada -->
    <section class="bg-cover mb-12" style="background-image: url({{ asset('img/home/city_home.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white text-5xl tracking-wider">Este es el futuro titulo de la plataforma</h1>
                <p class="text-white text-xl mt-2 pb-4">En esta plataforma podrá aprender a programar y más cosas </p>
                <!-- component -->
                @livewire('search')
            </div>
        </div>

    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center space-x-2 text-3xl mb-8">CONTENIDO</h1>
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/coding.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y Proyectos</h1>
                </header>
                <p class="text-sm text-gray-500 font-sans">Lorem ipsum dolor sit amet consectetur adipisicing elit, tempora
                    labore vel explicabo temporibus!</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/production.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Manuales</h1>
                </header>
                <p class="text-sm text-gray-500 ">Lorem ipsum dolor sit amet consectetur adipisicing elit, tempora
                    labore vel explicabo temporibus!</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/cyber-security.png') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Programación</h1>
                </header>
                <p class="text-sm text-gray-500 ">Lorem ipsum dolor sit amet consectetur adipisicing elit, tempora
                    labore vel explicabo temporibus!</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/monitor.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Diseño Web</h1>
                </header>
                <p class="text-sm text-gray-500 ">Lorem ipsum dolor sit amet consectetur adipisicing elit, tempora
                    labore vel explicabo temporibus!</p>
            </article>
        </div>
    </section>
    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-3xl text-yellow-50">¿Título sección?</h1>
        <p class="text-center text-yellow-50">Podrás encontar la mejor formación online en nuestra sección Cursos y
            Proyectos</p>
        <div class="flex justify-center">
            <a href="{{ route('courses.index') }}"
                class="mt-6 py-2 px-6 text-white rounded-lg bg-yellow-400 hover:bg-yellow-600 shadow-lg block md:inline-block">Cursos</a>
        </div>
    </section>
    <section class="mt-24 mb-12" >
        <h1 class="text-center text-3xl text-gray-600">Los mejores cursos de programación web </h1>
        <p class="text-center text-gray-500 text-sm mb-6">Aprender a programar puede ser divertido..</p>

        <div
            class="container grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
            <x-course-card :course="$course" />

            @endforeach

        </div>
    </section>
    @include('components.footer')
</x-app-layout>
