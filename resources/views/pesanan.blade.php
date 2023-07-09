@php
    $product = new  \App\Models\Product;
    $user = new  \App\Models\User;
@endphp

<x-index-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="w-screen h-full p-10">
     @if ($cart->count())
          <table class='w-[calc(100vw-20rem)] mx-auto'>
               <thead>
                    <tr class="border-b border-black">
                         <th class="p-3">No.</th>
                         <th class="p-3">Pemesan</th>
                         <th class="p-3">Product</th>
                         <th class="p-3">Qty</th>
                         <th class="p-3">Total Price</th>
                         <th class="p-3">Confirm</th>
                    </tr>
               </thead>
               <tbody class="text-center">
                    @foreach ($cart as $data)
                         <tr class="border-b border-slate-500/50 odd:bg-slate-100">
                              <td class="p-3">{{ $loop->iteration }}.</td>
                              <td class="p-3">{{ $user->where('id', $data->id_user)->first()->name }}</td>
                              <td class="p-3">{{ $product->where('id_product', $data->id_product)->first()->name }}</td>
                              <td class="p-3">{{ $data->where('id_product', $data->id_product)->first()->qty }}</td>
                              <td class="p-3">Rp.{{ $data->where('id_product', $data->id_product)->first()->total_harga }}</td>
                              <td class="p-3 flex justify-center">
                                   @if ($data->status == 'requested')
                                        <form action="/confirm/order/{{ $data->id_pesanan }}" method="post">
                                             @csrf
                                             <x-primary-button class="bg-green-600" onclick="return confirm('Are you sure?')"><i class="fas fa-check"></i></x-primary-button>
                                        </form>
                                        <form action="/cancel/order/{{ $data->id_pesanan }}" method="post">
                                             @csrf
                                             <x-primary-button class="bg-red-600" onclick="return confirm('Are you sure?')"><i class="fas fa-x"></i></x-primary-button>
                                        </form>
                                   @endif
                                   @if ($data->status == 'confirmed')
                                        <h1 class="text-red-600 font-semibold">Order Confirmed</h1>
                                   @endif
                                   @if ($data->status == 'canceled')
                                        <h1 class="text-red-600 font-semibold">Order Canceled</h1>
                                   @endif
                              </td>
                         </tr>
                    @endforeach
               </tbody>
          </table> 
          @else 
               <h1 class="text-center font-semibold text-2xl">Order Empty</h1>
         @endif
    </div>
</x-index-layout>