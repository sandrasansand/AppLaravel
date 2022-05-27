<div class="mt-16">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8 font-garmond">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!! $current->iframe !!}
            </div>
            <h1 class="text-3xl text-gray-600 font-bold mt-4"> {{ $current->name }}</h1>
            @if ($current->description)
                <div class="text-gray-600">{{ $current->description->name }}</div>
            @endif


            <div class="flex justify-between mt-4 ">
                <div class="flex items-center cursor-pointer" wire:click="completed">
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-green-600"></i>
                    @else
                        <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                    @endif
                    <p class="text-sm ml-2">Finalizar la unidad.</p>
                </div>

                @if ($current->resource) 
                    <div class="flext items-center text-gray-600 cursor-pointer" wire:click="download">
                        <i class="fas fa-download text-lg"></i>
                        <p class="text-sm ml-2">Descargar recursos</p>
                    </div>
                    @endif
            </div>


            <div class="card mt-2">
                <div class="card-body flex font-bold text-gray-600 shadow">
                    @if ($this->previous)
                        <a wire:click="changeLesson({{ $this->previous }})"
                            class="cursor-pointer hover:text-blue-500">Unidad anterior</a>
                    @endif
                    @if ($this->next)
                        <a wire:click="changeLesson({{ $this->next }})"
                            class="ml-auto cursor-pointer hover:text-blue-500">Siguiente
                            unidad</a>
                    @endif

                </div>
            </div>


        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl text-center text-gray-700 hover:text-yellow-600 leading-8 mb-4">
                    {{ $course->title }}</h1>

                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-2"
                            src="{{ $course->teachers->profile_photo_url }}" alt="">
                    </figure>
                    <div class="">
                        <p>{{ $course->teachers->name }}</p>
                        <a class="text-blue-400 text-sm"
                            href="">{{ '@' . Str::slug($course->teachers->name, '') }}</a>
                    </div>
                </div>
                <p class="text-gray-600 text-sm mt-2">{{ $this->advance }} completo</p>
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
                        <div style="width:{{ $this->advance }}"
                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500">
                        </div>
                    </div>
                </div>

                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a
                                class="font-bold text-base inline-block mb-2 hover:text-blue-700">{{ $section->name }}</a>

                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id)
                                                    <span
                                                        class="inline-block w-4 h-4 border-2 border-yellow-400 rounded-full mr-2 mt-1">
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-block w-4 h-4 bg-yellow-400 rounded-full mr-2 mt-1">
                                                    </span>
                                                @endif
                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <span
                                                        class="inline-block w-4 h-4 border-2 border-slate-500 rounded-full mr-2 mt-1">
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-block w-4 h-4 bg-slate-500 rounded-full mr-2 mt-1">
                                                    </span>
                                                @endif
                                            @endif

                                        </div>

                                        <a class="cursor-pointer hover:text-blue-600"
                                            wire:click="changeLesson({{ $lesson }})">{{ $lesson->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
