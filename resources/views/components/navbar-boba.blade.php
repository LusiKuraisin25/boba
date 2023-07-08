@php
    $category = \App\Models\Category::all();
@endphp

<div x-data="{ open: false, option: false }" x-cloak>
     <nav class="w-screen flex justify-between items-center py-7 bg-amber-950 px-10">
          @can('admin')
              <a href=""><i class="fas fa-arrow-left text-white text-xl"></i></a>
          @endcan
          @can('user')
          <div>
               <a href="{{ url('') }}">
                    <i class="fas fa-home px-2 cursor-pointer text-2xl text-gray-300 hover:text-white"></i>
               </a>
               <i class="fas fa-search px-2 cursor-pointer text-2xl text-gray-300 hover:text-white" x-on:click="open = ! open"></i>
          </div>
          @endcan
          <div class="text-white">
               @can('user')
                    <a href="{{ url('keranjang') }}" class="px-2">
                         <i class="fas fa-shopping-cart text-2xl text-gray-300 hover:text-white"></i>
                    </a>
               @endcan
               <i class="fas fa-bars text-2xl px-2 cursor-pointer text-gray-300 hover:text-white relative" onclick="showDropdown()"></i>
          </div>
     </nav>
     
     @can('user')
          <nav class="w-screen flex absolute justify-center z-10 top-[50px]">
               <div class="flex justify-around w-3/4 bg-amber-700 text-xl rounded-lg text-gray-300 font-semibold">
                    @foreach ($category as $data)
                         <a href="{{ url('category/' . $data->slug) }}" class="p-5 hover:text-white {{ Request::is('category/' . $data->slug) ? 'border-b-4 border-amber-950' : '' }}">{{ $data->name }}</a>
                    @endforeach
               </div>
          </nav>
     @endcan
     @can('admin')
          <nav class="w-screen flex absolute justify-center z-10 top-[50px]">
               <div class="flex justify-around w-3/4 bg-amber-700 text-xl rounded-lg text-gray-300 font-semibold">
                    <a href="/dashboard" class="p-5 hover:text-white {{ Request::is('dashboard') ? 'border-b-4 border-amber-950' : '' }}">Dashboard</a>
                    <a href="/pesanan" class="p-5 hover:text-white {{ Request::is('pesanan') ? 'border-b-4 border-amber-950' : '' }}">Orders</a>
                    <a href="/transaksi" class="p-5 hover:text-white {{ Request::is('transaksi') ? 'border-b-4 border-amber-950' : '' }}">Transactions</a>
                    <a href="/products" class="p-5 hover:text-white {{ Request::is('products') ? 'border-b-4 border-amber-950' : '' }}">Products</a>
               </div>
          </nav>
     @endcan
     
     <div class="inset-0 fixed text-center p-40 bg-gray-900/30 backdrop-blur-sm z-50" x-show="open">
          <form action="/search" method="get">
               <div x-on:click.outside="open = false" class="p-10 rounded-lg bg-amber-950/90 border border-amber-600 flex flex-col items-center">
                    <input type="search" name="search" id="search" class="p-3 rounded-lg w-full bg-transparent border-gray-300 text-gray-200 focus:outline-amber-600 focus:ring-amber-600 focus:border-amber-600 py-3" placeholder="Search..." autofocus>
               </div>
          </form>
     </div>

     <div class="text-center absolute -right-full top-20 w-36 flex flex-col items-center text-white bg-amber-700/90 border border-amber-600 menu transition-all duration-300 opacity-0 rounded-lg overflow-hidden z-50">
          @can('admin')
          <a href="/dashboard" class="hover:bg-amber-500 w-full p-2">Dashboard</a>
          @endcan
          @auth
               <a href="/profile" class="hover:bg-amber-500 w-full p-2">Profile</a>
               <div class="hover:bg-amber-500 p-2 w-full">
                    <form method="POST" action="{{ route('logout') }}">
                         @csrf
                         <button type="submit" onclick="return confirm('Are you sure to logout?')">Logout</button>
                    </form>
               </div>
          @endauth
          @guest
               <a href="/login" class="hover:bg-amber-500 w-full p-2">Login</a>
          @endguest
     </div>
</div>
<script>
     const showDropdown = () => {
          $('.menu').toggleClass('-right-full');
          $('.menu').toggleClass('right-0');
          $('.menu').toggleClass('opacity-100');
     }
</script>