@php
    $product = new  \App\Models\Product;
    $totalPrice = 0;
@endphp

<x-index-layout>
     <x-slot:title>{{ $title }}</x-slot>
     <div class="max-w-[90vw] w-full mx-auto p-10 my-20 shadow-md shadow-slate-500 rounded-lg">
          <div class="flex items-start justify-between pb-10 border-b border-slate-500/50">
               <div class="flex gap-10">
                    <div class="rounded-full w-40 h-40 flex justify-center items-center overflow-hidden shrink-0 ring ring-amber-700">
                         <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="">
                    </div>
                    <div class="grid grid-cols-3 gap-7">
                         <div class="">
                              <h1 class="font-semibold text-xl">Nama Lengkap</h1>
                              <h1 class="text-lg">{{ auth()->user()->name }}</h1>
                         </div>
                         <div class="">
                              <h1 class="font-semibold text-xl">Alamat Email</h1>
                              <h1 class="text-lg">{{ Illuminate\Support\Str::of(auth()->user()->email)->mask('*', 2, -10) }}</h1>
                         </div>
                         <div class="">
                              <h1 class="font-semibold text-xl">Nomor Telepon</h1>
                              <h1 class="text-lg {{ auth()->user()->no_telpon ? 'text-black' : 'text-slate-500' }}">{{ auth()->user()->no_telepon ? Illuminate\Support\Str::of(auth()->user()->no_telepon)->mask('*', 3) : 'Nomor Telepon belum diisi' }}</h1>
                         </div>
                         <div class="">
                              <h1 class="font-semibold text-xl">Jenis Kelamin</h1>
                              <h1 class="text-lg {{ auth()->user()->gender ? 'text-black' : 'text-slate-500' }}">{{ auth()->user()->gender ?? 'Jenis Kelamin belum diisi' }}</h1>
                         </div>
                         <div class="">
                              <h1 class="font-semibold text-xl">Alamat</h1>
                              <h1 class="text-lg {{ auth()->user()->alamat ? 'text-black' : 'text-slate-500' }}">{{ auth()->user()->alamat ?? 'Alamat belum diisi' }}</h1>
                         </div>
                    </div>
               </div>
               <div class="">
                    <a href="/profile/edit">
                         <i class="fas fa-edit text-2xl"></i>
                    </a>
               </div>
          </div>
          <div class="p-5">
               <h1 class="text-xl font-semibold">My Orders</h1>
               <div class="">
                    @if ($order->count())
                    <table class='w-[calc(100vw-15rem)] mx-auto'>
                         <thead>
                              <tr class="border-b border-black">
                                   <th class="p-3">No.</th>
                                   <th class="p-3">Product</th>
                                   <th class="p-3">Qty</th>
                                   <th class="p-3">Status</th>
                                   <th class="p-3">Price</th>
                                   <th class="p-3">Action</th>
                              </tr>
                         </thead>
                         <tbody class="text-center">
                              @foreach ($order as $data)
                                   <tr class="border-b border-slate-500/50 odd:bg-slate-100">
                                        <td class="p-3">{{ $loop->iteration }}.</td>
                                        <td class="p-3">
                                             <a href="{{ url('/keranjang/' . base64_encode($data->id_pesanan)) }}">{{ $product->where('id_product', $data->id_product)->first()->name }}</a>
                                        </td>
                                        <td class="p-3">{{ $data->where('id_product', $data->id_product)->first()->qty }}</td>
                                        <td class="p-3">{{ $data->status }}</td>
                                        <td class="p-3">Rp.{{ $data->where('id_product', $data->id_product)->first()->total_harga }}</td>
                                        <td class="p-3">
                                             <form action="/delete/order/{{ $data->id_pesanan }}" method="post">
                                                  @method('delete')
                                                  @csrf
                                                  <x-primary-button class="bg-red-600" onclick="return confirm('Are you sure?')"><i class="fas fa-x"></i></x-primary-button>
                                             </form>
                                        </td>
                                   </tr>
                                   @php
                                        $totalPrice += $data->where('id_product', $data->id_product)->first()->total_harga; // Menambahkan harga produk ke total harga
                                   @endphp
                              @endforeach
                              <tr>
                                   <td colspan="4" class="text-end font-semibold">Total Price</td>
                                   <td>Rp.{{ $totalPrice }}</td>
                              </tr>
                         </tbody>
                    </table> 
                    @else 
                         <h1 class="text-center font-semibold text-2xl">order Empty</h1>
               @endif
               </div>
          </div>
     </div>
</x-index-layout>