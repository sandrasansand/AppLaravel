<div>
   <article class="card" x-data= "{open: false}">
       <div class="card-body bg-gray-100">
            <header>
                <h1 x-on:click= "open = !open" class="cursor-pointer">Descripción de la lección</h1>
            </header>

            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="form-input w-full"></textarea>
                        @error('description.name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                        <div class="flex justify-end">
                            <button wire:click="destroy" type="button" class="btn btn-danger text-sm">Eliminar</button>
                            <button type="submit" class="btn btn-primary text-sm ml-2">Actualizar</button>
                        </div>
                    </form>
                @else
                    
                    <div class="">
                        <textarea wire:model="name" class="form-input w-full rounded" placeholder="Escriba una descripción de la lección"></textarea>
                        @error('name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                        <div class="flex justify-end">
                         
                            <button wire:click="store" class="btn btn-primary text-sm ml-2">Agregar</button>
                        </div>
                    </div>

                @endif
            </div>


       </div>

   </article>
</div>
   
   