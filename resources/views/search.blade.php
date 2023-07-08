<x-index-layout>
     <x-slot:title>Search</x-slot>
     @if ($data->count())
     <h1 class="text-center mt-20 text-2xl font-semibold">Search result "{{ $request }}"</h1>
     @else
     <h1 class="text-center mt-20 text-2xl font-semibold">No result "{{ $request }}"</h1>
     @endif
     <div class="grid grid-cols-3 w-screen gap-10 px-20 py-10 mt-5">
          @if ($data->count())
               @foreach ($data as $d)
               <div class="p-5 shadows rounded-2xl flex flex-col items-center">
                    <img src="/img/{{ $d->slug }}.jpg" alt="">
                    <h1 class='font-medium mt-5 text-2xl harga'>{{ $d->harga }}</h1>
                    <h1>{{ $d->name }}</h1>
                    <div class="flex justify-center items-center w-2/3 px-3 cursor-pointer" onclick="changeText({{ $d->id_product }})">
                         <form action="/keranjang" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{ $d->id_product }}">
                              <button type="submit" class="bg-green-500 p-1 rounded-md px-3" id={{ $d->id_product }}>Add to cart <i class="fas fa-shopping-cart"></i></button>
                         </form>
                         </div>
                    </div>
               @endforeach
          @endif
     </div>
</x-index-layout>