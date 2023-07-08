@php
    $product = new  \App\Models\Product;
    $user = new  \App\Models\User;
    $transaksi = new  \App\Models\Transaksi;
@endphp

<x-index-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="w-screen h-full p-20 grid grid-cols-3 gap-5">
        <div class="p-5 rounded-lg border border-gray-500 w-max space-y-5">
            <h1 class="font-semibold text-xl">Current User</h1>
            <p class="text-xl bg-amber-700 w-max rounded-md p-1 text-white">{{ $user->where('role', 'User')->get()->count() }}</p>
        </div>
        <div class="p-5 rounded-lg border border-gray-500 w-max space-y-5">
            <h1 class="font-semibold text-xl">Current Transaction</h1>
            <p class="text-xl bg-amber-700 w-max rounded-md p-1 text-white">{{ $transaksi->all()->count() }}</p>
        </div>
    </div>
</x-index-layout>