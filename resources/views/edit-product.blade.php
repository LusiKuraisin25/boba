<x-index-layout>
     <x-slot:title>{{ $title }}</x-slot>
     <a href="/products" class="text-xl font-semibold ml-10 mt-10">Back</a>
     <div class="max-w-[90vw] w-full mx-auto p-10 my-20 shadow-md shadow-slate-500 rounded-lg">
          <form action="/product/{{ $data->id_product }}/edit" method="post" enctype="multipart/form-data">
               @method('put')
               @csrf
               <input type="hidden" name="id_product" value="{{ $data->id_product }}">
               <div class="flex items-start justify-between">
                    <div class="flex gap-10">
                         <div class="flex flex-col gap-5">
                              <div class="rounded-full w-52 h-52 flex justify-center items-center overflow-hidden shrink-0 ring ring-amber-700 relative">
                                   <img src="{{ asset('storage/' . $data->image) }}" alt="image preview" id="imagePreview1">
                                   <img src="" alt="image preview" id="imagePreview2" class="hidden">
                                   <h1 class="absolute text-white opacity-0 transition-opacity duration-300 hover:opacity-100 bg-black bg-opacity-50 w-full h-full flex justify-center items-center cursor-pointer" onclick="editImage()">
                                       <i class="fas fa-edit mr-2"></i>Edit image
                                   </h1>
                               </div>                               
                              <input type="file" name="image" onchange="previewImage(e)" id="file" class="invisible">
                         </div>
                         <div class="grid grid-cols-3 gap-5">
                              <div class="">
                                   <h1 class="font-semibold text-xl">Product Name</h1>
                                   <x-text-input name="name" value="{{ $data->name ?? '' }}" />
                              </div>
                              <div class="">
                                   <h1 class="font-semibold text-xl">Price</h1>
                                   <x-text-input name="harga" value="{{ $data->harga ?? '' }}" />
                              </div>
                              <div class="">
                                   <h1 class="font-semibold text-xl">Description</h1>
                                   <x-text-input name="deskripsi" value="{{ $data->deskripsi ?? '' }}" />
                              </div>
                              <div class="">
                                   <h1 class="font-semibold text-xl">Stock</h1>
                                   <x-text-input name="stock" type="number" min="0" value="{{ $data->stock ?? '' }}" />
                              </div>
                              <div class="">
                                   <h1 class="font-semibold text-xl">Category</h1>
                                   <select name="id_category" class="rounded-lg border border-slate-300">
                                        <option value="">--Choose Category--</option>
                                        @foreach ($category as $d)
                                             <option value="{{ $d->id_category }}" {{ $d->id_category == $data->id_category ? 'selected' : '' }}>{{ $d->name }}</option>
                                        @endforeach
                                   </select>
                              </div>
                         </div>
                    </div>
                    <div>
                         <x-primary-button type="submit">Simpan</x-primary-button>
                    </div>
               </div>
          </form>
     </div>

     <script>
          function editImage() {
               document.getElementById('file').click()
          }

          function previewImage(e) 
               document.getElementById('imagePreview1')
              var reader = new FileReader();
              reader.onload = function() {
                  var output = document.getElementById('imagePreview');
                  output.src = reader.result;
              }
              reader.readAsDataURL(e.target.files[0]);
          }
      </script>
</x-index-layout>