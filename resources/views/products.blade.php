@php
    $product = new  \App\Models\Product;
@endphp

<x-index-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="w-screen h-full p-10">
          <a href="/product/add" class="text-end"><i class="fas fa-plus"></i>Add Product</a>
        <div class="grid grid-cols-3 w-screen gap-10 px-20 py-10 mt-5">
            @if ($data->count())
                 @foreach ($data as $d)
                 <div class="p-5 shadows rounded-2xl flex flex-col items-center">
                      <img src="{{ asset('storage/' . $d->image) }}" alt="">
                      <h1 class='font-medium mt-5 text-2xl harga'>{{ Illuminate\Support\Str::limit($d->harga, 2, 'K') }}</h1>
                      <h1>{{ $d->name }}</h1>
                      <div class="flex justify-center items-center w-2/3 px-3 cursor-pointer">
                                <a href="/product/{{ base64_encode($d->id_product) }}" class="bg-green-500 p-1 rounded-md px-3">Edit Product <i class="fas fa-edit"></i></a>
                         </div>
               </div>
                 @endforeach
            @endif
    </div>
</x-index-layout>