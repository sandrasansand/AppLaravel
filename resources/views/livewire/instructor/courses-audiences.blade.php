<section>
    <h1 class="text-2xl font-bold uppercase">Audiencias del curso</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->audiences as $item)
        <article class="card mb-4">
            <div class="card-body bg-gray-100">

                @if ($audience->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="audience.name" class="form-input w-full">

                        @error('audience.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </form>
                @else


                    <header class="flex justify-between">
                        <h1 class="">{{ $item->name }}</h1>
                        <div>
                            <i wire:click="edit({{ $item }})"
                                class="fas fa-edit text-blue-500 cursor-pointer"></i>
                            <i wire:click="destroy({{ $item }})"
                                class="fas fa-trash text-green-500 cursor-pointer ml-2"></i>
                        </div>
                    </header>
                @endif
            </div>
        </article>
    @endforeach

    <article class="card">
        <div class="card-body bg-gray-100">
            <form wire:submit.prevent="store">
                <input wire:model="name" class="form-input w-full" placeholder="Escriba el nombre del audiencias">

                @error('name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror

                <div class="flex justify-end mt-2">
                    <button type="submit" class="btn btn-primary">Añadir audiencias</button>
                </div>
            </form>
        </div>
    </article>
</section>
