<x-index-layout>
     <x-slot:title>{{ $title }}</x-slot>
     <div class="max-w-[90vw] w-full mx-auto p-10 my-20 shadow-md shadow-slate-500 rounded-lg">
          <form action="/profile/{{ auth()->user()->id }}/edit" method="post" enctype="multipart/form-data">
               @method('patch')
               @csrf
               <div class="flex items-start justify-between">
                    <div class="flex gap-10">
                         <div class="flex flex-col gap-5">
                              <div class="rounded-full w-52 h-52 flex justify-center items-center overflow-hidden shrink-0 ring ring-amber-700 relative">
                                   <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="image preview" id="imagePreview">
                                   <h1 class="absolute text-white opacity-0 transition-opacity duration-300 hover:opacity-100 bg-black bg-opacity-50 w-full h-full flex justify-center items-center cursor-pointer" onclick="editImage()">
                                       <i class="fas fa-edit mr-2"></i>Edit image
                                   </h1>
                               </div>                               
                              <input type="file" name="image" onchange="previewImage(e)" id="file" class="invisible">
                         </div>
                         <div class="grid grid-cols-3 gap-5">
                              <div class="">
                                   <h1 class="font-semibold text-xl">Nama Lengkap</h1>
                                   <x-text-input name="name" value="{{ auth()->user()->name ?? '' }}" />
                              </div>
                              <div class="">
                                   <h1 class="font-semibold text-xl">Alamat Email</h1>
                                   <x-text-input name="email" value="{{ auth()->user()->email ?? '' }}" />
                              </div>
                              <div class="">
                                   <h1 class="font-semibold text-xl">Nomor Telepon</h1>
                                   <x-text-input name="no_telepon" value="{{ auth()->user()->no_telepon ?? '' }}" />
                              </div>
                              <div class="">
                                   <h1 class="font-semibold text-xl">Jenis Kelamin</h1>
                                   <select name="gender" class="rounded-lg border border-slate-300">
                                        <option value="Pria" {{ auth()->user()->gender == 'Pria' ? 'selected' : '' }}>Pria</option>
                                        <option value="Wanita" {{ auth()->user()->gender == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                   </select>
                                   </div>
                              <div class="">
                                   <h1 class="font-semibold text-xl">Alamat</h1>
                                   <x-text-input name="alamat" value="{{ auth()->user()->alamat ?? '' }}" />
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

          function previewImage(e) {
              var reader = new FileReader();
              reader.onload = function() {
                  var output = document.getElementById('imagePreview');
                  output.src = reader.result;
              }
              reader.readAsDataURL(e.target.files[0]);
          }
      </script>
</x-index-layout>