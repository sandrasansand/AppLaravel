<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12 mt-10">
        <h1 class="text-gray-500 text-3xl font-garmond fony-bold">Detalle del Pedido</h1>
        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                    <h1 class="text-lg ml-2">{{ $course->title }}</h1>
                    <p class="text-xl font-bold ml-auto">{{ $course->price->value }} €</p>

                </article>
                <div class="flex justify-end mt-2 mb-4">
                    <a class="btn btn-primary" href="{{route('payment.pay',$course)}}">Comprar</a>
                    
                </div>
                <div class="flex items-center w-4/6 mt-2 mb-4"
                 id="paypal-button-container"></div>
                <hr>
               <p class="text-sm mt-4"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quis cupiditate, inventore distinctio ea, magnam a fugit earum ad fugiat similique vero quasi! Expedita enim dolorem, consectetur amet odit ducimus?<a class="text-red-400 font-bold" href="">Términos y condiciones</a></p>
            </div>
        </div>
    </div>
      <!-- Replace "test" with your own sandbox Business account app client ID -->
      <script src="https://www.paypal.com/sdk/js?client-id={{config('services.paypal.client_id')}}"></script>
      {{-- <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID"></script> --}}
      
      <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
           
            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: {{ $course->price->value }}
                        }
                    }]
                });
            },
    
            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            },
    
            //Changes credit/debit button behavior to "old" version
            onShippingChange: function(data,actions){
                //if not needed do nothing..
                return actions.resolve();
            }
    
    
        }).render('#paypal-button-container');
    </script>
    </x-app-layout>
