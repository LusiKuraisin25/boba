@php
    $product = new  \App\Models\Product;
    $user = new  \App\Models\User;
@endphp

<x-index-layout>
     <x-slot:title>Transaction</x-slot>
     <div class="w-screen h-full p-10 my-10">
         @if ($transaction->count())
          <table class='w-[calc(100vw-20rem)] mx-auto'>
               <thead>
                    <tr class="border-b border-black">
                         <th class="p-3">No.</th>
                         <th class="p-3">ID Transaksi</th>
                         <th class="p-3">Pemesan</th>
                         <th class="p-3">Nama Produk</th>
                         <th class="p-3">Qty</th>
                         <th class="p-3">Harga</th>
                         <th class="p-3">Total Harga</th>
                         <th class="p-3">Tanggal Transaksi</th>
                         <th class="p-3">Action</th>
                    </tr>
               </thead>
               <tbody class="text-center">
                    @foreach ($transaction as $data)
                         <tr class="border-b border-slate-500/50 odd:bg-slate-100">
                              <td class="p-3">{{ $loop->iteration }}.</td>
                              <td class="p-3">{{ $data->id_transaksi }}</td>
                              <td class="p-3">{{ $user->where('id', $data->id_user)->first()->name }}</td>
                              <td class="p-3">{{ $data->name_product }}</td>
                              <td class="p-3">{{ $data->qty }}</td>
                              <td class="p-3">{{ $data->harga }}</td>
                              <td class="p-3">{{ $data->total_harga }}</td>
                              <td class="p-3">{{ $data->created_at->diffForHumans() }}</td>
                              <td class="p-3">
                                   <form action="/delete/cart/{{ $data->id_cart }}" method="post">
                                        @csrf
                                        <x-primary-button class="bg-red-600" onclick="return confirm('Are you sure?')"><i class="fas fa-x"></i></x-primary-button>
                                   </form>
                              </td>
                         </tr>
                    @endforeach
               </tbody>
          </table> 
          @else 
               <h1 class="text-center font-semibold text-2xl">Transaction Empty</h1>
         @endif
     </div>
</x-index-layout>