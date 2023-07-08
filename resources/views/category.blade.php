<x-index-layout>
     <x-slot:title>{{ $title }}</x-slot>
     <div class="grid grid-cols-3 w-screen gap-10 p-20 mt-5">
          @foreach ($product as $data)
               <div class="p-5 shadows rounded-2xl flex flex-col items-center">
                    <img src="/img/{{ $data->slug }}.jpg" alt="">
                    <h1 class='font-medium mt-5 text-2xl harga'>{{ Illuminate\Support\Str::limit($data->harga, 2, 'K') }}</h1>
                    <h1>{{ $data->name }}</h1>
                    <div class="flex justify-center items-center w-2/3 px-3 cursor-pointer" onclick="changeText({{ $data->id_product }})">
                         <form action="/keranjang" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{ $data->id_product }}">
                              <button type="submit" class="bg-green-500 p-1 rounded-md px-3" id={{ $data->id_product }}>Add to cart <i class="fas fa-shopping-cart"></i></button>
                         </form>
                    </div>
               </div>
          @endforeach
     </div>
</x-index-layout>