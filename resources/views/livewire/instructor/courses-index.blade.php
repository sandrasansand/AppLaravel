<div class="container py-8 font-garmond mt-12">

    <x-table-responsive>

        <div class="px-6 py-4 flex">
            <input wire:keydown="clean" wire:model="search" class="form-input flex-1 rounded shadow-sm p-2"
                placeholder="Escriba el nombre de un curso..">

            <a class="btn btn-danger ml-2" href="{{ route('instructor.courses.create') }}">Crear Curso</a>
        </div>
        @if ($courses->count())


            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Matriculados
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Calificacion
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Editar
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($courses as $course)
                        <tr>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @isset($course->image)

                                            <img class="w-full h-full rounded-full object-cover object-center"
                                                src="{{ Storage::url($course->image->url) }}" alt="" />
                                        @else
                                            <img class="w-full h-full rounded-full object-cover object-center"
                                                src="https://images.pexels.com/photos/735911/pexels-photo-735911.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
                                                alt="" />
                                        @endisset
                                    </div>
                                    <div class="ml-4">
                                        <div class="ml-3 text-gray-700 font-medium">

                                            {{ $course->title }}

                                        </div>
                                        <div class="text-sm text-gray-500 ml-4">
                                            {{ $course->category->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>


                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $course->students->count() }}
                                <p class="text-sm text-gray-500">Alumnos</p>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center text-gray-700">
                                    {{ $course->rating }}
                                    <ul class="flex text-sm text-center  ml-2">
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
                                </div>
                                <div class="text-sm text-gray-500">Valoraciones</div>
                            </td>


                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @switch($course->status)
                                    @case(1)
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-red-700 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                            <span class="relative">Borrador</span>
                                        </span>
                                    @break
                                    @case(2)
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-yellow-600 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                                            <span class="relative">Revisión</span>
                                        </span>
                                    @break
                                    @case(3)
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                            <span class="relative">Publicado</span>
                                        </span>
                                    @break
                                    @default

                                @endswitch

                            </td>
                            <td
                                class="
                            text-center text-dark
                            font-medium
                            text-base
                            py-5
                            px-2
                            bg-white
                            border-b border-r border-[#E8E8E8]
                            ">
                                <a href="{{ route('instructor.courses.edit', $course) }}"
                                    class="
                                border border-primary
                                py-2
                                px-6
                                text-primary
                                inline-block
                                rounded
                                hover:bg-blue-500 hover:text-white
                                ">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $courses->links() }}
            </div>
        @else
            <div class="px-6 py-4">
                Por el momento no hay ninguna sugerencia..
            </div>
        @endif
    </x-table-responsive>
</div>
