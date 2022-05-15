<div class="mt-10">
    {{-- <x-slot name='course'>
        {{ $course->slug }}
    </x-slot> --}}
    <h1 class="text-2xl font-bold mb-4 mt-12">Estudiantes del Curso</h1>

    <x-table-responsive>

        <div class="px-6 py-4 flex">
            <input wire:model="search" class="form-input flex-1 rounded shadow-sm p-2"
                placeholder="Escriba el nombre de un curso..">


        </div>
        @if ($students->count())


            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>

                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Editar</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($students as $student)
                        <tr>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">

                                        <img class="w-full h-full rounded-full object-cover object-center"
                                            src="{{ $student->profile_photo_url }}" alt="" />
                                    </div>
                                    <div class="ml-4">
                                        <div class="ml-3 text-gray-700 font-medium">
                                            {{ $student->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="ml-3 text-gray-700 font-medium">
                                    {{ $student->email }}
                                </div>
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
                                <a href=""
                                    class="
                            border border-primary
                            py-2
                            px-6
                            text-primary
                            inline-block
                            rounded
                            hover:bg-blue-500 hover:text-white
                            ">
                                    Ver
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $students->links() }}
            </div>
        @else
            <div class="px-6 py-4">
                Por el momento no hay ninguna sugerencia..
            </div>
        @endif
    </x-table-responsive>
   
</div>

