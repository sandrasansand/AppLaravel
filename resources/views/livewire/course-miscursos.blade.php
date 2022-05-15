<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-6 pt-12 mt-10">
   <h1 class="text-2xl font-semibold mb-4">Mis cursos matriculados</h1>

                   
           <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                                   
                   <li class="overflow-hidden">
                      @foreach ($courses as $course)
                          
                      @endforeach
                       <a class="block" href="{{$course->image->url}}">
                           
                           <figure class="aspect-w-16 aspect-h-9">
                               <img src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/WCBsEI61yWdO00CVmENfVOW7cryteWsBxRJhZQY4.png" alt="Crea un Ecommerce con Laravel, Livewire, Tailwind y Alpine" class="rounded-lg object-cover object-center">
                           </figure>
                           
                           <h2 class="mt-1 truncate">Crea un Ecommerce con Laravel, Livewire, Tail...</h2>

                       </a>
                   </li>

               
           </ul>
</div>