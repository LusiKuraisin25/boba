@php
    $product = new  \App\Models\Product;
@endphp

<x-index-layout>
     <x-slot:title>Keranjang</x-slot>
     <div class="w-screen h-full p-10">
         @if ($cart->count())
          <table class='w-[calc(100vw-20rem)] mx-auto'>
               <thead>
                    <tr class="border-b border-black">
                         <th class="p-3">No.</th>
                         <th class="p-3">Product</th>
                         <th class="p-3">Qty</th>
                         <th class="p-3">Price</th>
                         <th class="p-3">Action</th>
                    </tr>
               </thead>
               <tbody class="text-center">
                    @foreach ($cart as $data)
                         <tr class="border-b border-slate-500/50 odd:bg-slate-100">
                              <td class="p-3">{{ $loop->iteration }}.</td>
                              <td class="p-3">
                                   <a href="{{ url('/keranjang/' . base64_encode($data->id_cart)) }}">{{ $product->where('id_product', $data->id_product)->first()->name }}</a>
                              </td>
                              <td class="p-3">{{ $data->where('id_product', $data->id_product)->first()->qty }}</td>
                              <td class="p-3">{{ $data->where('id_product', $data->id_product)->first()->total_harga }}</td>
                              <td class="p-3">
                                   <form action="/delete/cart/{{ $data->id_cart }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <x-primary-button class="bg-red-600" onclick="return confirm('Are you sure?')"><i class="fas fa-x"></i></x-primary-button>
                                   </form>
                              </td>
                         </tr>
                    @endforeach
               </tbody>
          </table> 
          @else 
               <h1 class="text-center font-semibold text-2xl">Cart Empty</h1>
         @endif
     </div>
</x-index-layout>