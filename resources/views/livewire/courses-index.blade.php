<div>
    {{-- Barra navigation --}}
    <div class="bg-gray-200 py-4 mb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700"
            wire:click="resetFilters">
                <i class="fas fa-chalkboard text-sm mr-2"></i>
                Cursos
            </button>

            <!-- component categories dropdown -->

            <div class="relative">
                <div x-data="{ dropdownOpen: false }" class="relative ml-2">
                    <button @click="dropdownOpen = !dropdownOpen"
                        class="bg-white p-2 focus:outline-none h-12 text-gray-700 rounded-lg leading-3">
                        <i class="fas fa-laptop-code text-sm mr-2"></i> Categoría
                        <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>

                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10">
                    </div>

                    <div x-show="dropdownOpen"
                        class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                        @foreach ($categories as $category)
                            <a 
                                class="cursor-pointer block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white"
                                wire:click="$set('category_id', {{$category->id}})" x-on:click="dropdownOpen = false">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- fin dropdown categories --}}
            <!-- component categories levels -->
            <div class="relative">
                <div x-data="{ dropdownOpen: false }" class="relative ml-2">
                    <button @click="dropdownOpen = !dropdownOpen"
                        class="bg-white p-2 focus:outline-none h-12 text-gray-700 rounded-lg leading-3">
                        <i class="fas fa-layer-group text-sm mr-2"></i> Nivel
                        <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>

                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10">
                    </div>

                    <div x-show="dropdownOpen"
                        class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                        @foreach ($levels as $level)
                            <a 
                                class="cursor-pointer block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white"
                                wire:click="$set('level_id', {{$level->id}})" x-on:click="dropdownOpen = false">
                                {{ $level->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- fin dropdown levels --}}
        </div>
        {{-- fin barra navigation --}}
    </div>
    {{-- section courses reutilizando component course-card //utilizamos el card desde un componente --}}
    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
           <x-course-card :course="$course" />
        @endforeach

    </div>
    {{-- fin section courses --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{ $courses->links() }}
    </div>
</div>


