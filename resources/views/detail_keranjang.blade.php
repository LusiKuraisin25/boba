@php
    $product = new  \App\Models\Product;
@endphp

<x-index-layout>
     <x-slot:title>{{ $title }}</x-slot>
     <div class="w-[calc(100vw-20rem)] mx-auto h-full p-10 space-y-5 mb-10">
          <a href="/keranjang" class="text-xl font-semibold">Back</a>
           <table class='w-full'>
                <thead>
                     <tr class="border-b border-black">
                          <th class="p-3">No.</th>
                          <th class="p-3">Product</th>
                          <th class="p-3">Qty</th>
                          <th class="p-3">Price</th>
                     </tr>
                </thead>
                <tbody class="text-center">
                    <tr class="border-b border-slate-500/50 odd:bg-slate-100">
                         <td class="p-3">1.</td>
                         <td class="p-3">{{ $product->where('id_product', $data->id_product)->first()->name }}</td>
                         <td class="p-3">{{ $data->where('id_product', $data->id_product)->first()->qty }}</td>
                         <td class="p-3">Rp.{{ $product->where('id_product', $data->id_product)->first()->harga }}</td>
                    </tr>
                    <tr class="border-b border-slate-500/50 odd:bg-slate-100">
                         <td class="text-end p-3" colspan="3">Total Price : </td>
                         <td class="p-3">Rp.{{ $data->total_harga }}</td>
                    </tr>
                </tbody>
           </table> 
           <form action="/checkout" method="post">
               @csrf
               <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
               <input type="hidden" name="id_cart" value="{{ $data->id_cart }}">
               <input type="hidden" name="id_product" value="{{ $data->id_product }}">
               <input type="hidden" name="product" value="{{ $product->where('id_product', $data->id_product)->first()->name }}">
               <input type="hidden" name="qty" value="{{ $data->where('id_product', $data->id_product)->first()->qty }}">
               <input type="hidden" name="harga" value="{{ $product->where('id_product', $data->id_product)->first()->harga }}">
               <input type="hidden" name="total" value="{{ $data->where('id_product', $data->id_product)->first()->total_harga }}">
               <x-primary-button class="float-right">Check out</x-primary-button>
          </form>
      </div>
</x-index-layout>