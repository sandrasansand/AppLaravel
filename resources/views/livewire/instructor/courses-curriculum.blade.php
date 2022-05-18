<div class="mt-10">
    {{-- <x-slot name="course">
        {{ $course->slug }}
    </x-slot> --}}

    <h1 class="text-2xl font-bold uppercase">Lecciones del curso</h1>
    <hr class="mb-6 mt-2">

    @foreach ($course->sections as $item)
        <article class="card mb-6" x-data="{ open: true }">
            <div class="card-body bg-gray-100">

                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="section.name" class="form-input w-full"
                            placeholder="Introduzca el nombre de la sección">
                        @error('section.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between text-center">
                        <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Sección:</strong>
                            {{ $item->name }}</h1>

                        <div>
                            <i class="fas fa-edit cursor-pointer hover:text-blue-500"
                                wire:click="edit({{ $item }})"></i>
                            <i class="fas fa-eraser cursor-pointer hover:text-red-500"
                                wire:click="destroy({{ $item }})"></i>
                        </div>

                    </header>

                    <div x-show="open">
                        @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif
            </div>
        </article>
    @endforeach

    <div x-data="{ open: false }">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Añadir nueva sección
        </a>

        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Añadir nueva sección</h1>

                <div class="mt-4">
                    <input wire:model="name" class="form-input w-full" placeholder="Esciba el nombre de la sección">
                </div>
                @error('name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                <div class="flex justify-end">
                    <button x-on:click="open = false" class="btn btn-danger">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Añadir</button>
                </div>
            </div>
        </article>
    </div>

</div>
