<x-instructor-layout :course="$course">
    <h1 class="font-bold text-2xl uppercase">Observaciones del Curso</h1>
    <hr class="mt-2 mb-6">

    <div class="text-gray-500">
        {!!$course->observation->body!!}
    </div>
</x-instructor-layout>

