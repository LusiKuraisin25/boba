<x-index-layout>
     <x-slot:title>Home</x-slot>
     <div class="w-screen h-screen flex justify-between items-center pl-16 border-b-4 border-amber-900">
          <div class="float-left mt-1">
               <h1 class="boba text-8xl mb-6" id="queen">Queen Boba</h1>
               <h1 class="store text-5xl ml-2 text-orange-500 font-bold" id="online">online store</h1>
               <p class="ml-2 mt-20" id="text"></p>
          </div>
          <img src="/img/boba.png" alt="">
     </div>
     <div class="w-screen h-full flex flex-col items-center py-16 px-40">
          <div class="flex flex-col items-center">
               <h1 class="text-5xl product mb-5">Our Product</h1>
               <p class="text-center mb-20">The carbohydrate content contained in tapioca balls (boba) is the main source of energy for the brain. Among them, it provides the body with fluid intake, contains antioxidants, contributes a small amount of minerals, contains various minerals such as iron, magnesium, manganese and phosphorus in small amounts derived from flour. tapioca.</p>
               <div class="grid grid-cols-3 gap-x-40 gap-y-10">
                    <div id="red">
                         <div class="rounded-full overflow-hidden">
                              <img src="/img/red-velvet.jpg" alt="" width="200">
                         </div>
                         <p class="text-center mt-5 font-bold">Red Velvet</p>
                    </div>
                    <div id="coklat">
                         <div class="rounded-full overflow-hidden">
                              <img src="/img/chocolatte-oreo.jpg" alt="" width="200">
                         </div>
                         <p class="text-center mt-5 font-bold">Chocolatte</p>
                    </div>
                    <div id="matcha">
                         <div class="rounded-full overflow-hidden">
                              <img src="/img/chocolatte-matcha.jpg" alt="" width="200">
                         </div>
                         <p class="text-center mt-5 font-bold">Matchalatte</p>
                    </div>
                    <div id="vanilla">
                         <div class="rounded-full overflow-hidden">
                              <img src="/img/vanilla.jpg" alt="" width="200">
                         </div>
                         <p class="text-center mt-5 font-bold">Vanila latte</p>
                    </div>
                    <div id="bubble">
                         <div class="rounded-full overflow-hidden">
                              <img src="/img/bubble.jpg" alt="" width="200">
                         </div>
                         <p class="text-center mt-5 font-bold">Bubble Gum</p>
                    </div>
                    <div id="taro">
                         <div class="rounded-full overflow-hidden">
                              <img src="/img/taro.jpg" alt="" width="200">
                         </div>
                         <p class="text-center mt-5 font-bold">Taro</p>
                    </div>
               </div>
          </div>
     </div>
     <div class="w-screen h-full flex justify-center items-center py-16">
     </div>
          <div class="grid grid-cols-3 max-w-8xl mx-auto gap-x-10">
               <div class="hover:shadow-xl hover:shadow-gray-500/50 rounded-lg p-10 mx-auto transition-all mb-3">
                    <div class="flex gap-2">
                         <i class="fas fa-carrot text-amber-500 text-3xl"></i>
                         <div class="flex flex-col items-start">
                              <h1 class="font-bold text-3xl patrick">
                                   Fresh & Healthy
                              </h1>
                              <p>Good for body health</p>
                         </div>
                    </div>
               </div>
               <div class="hover:shadow-xl hover:shadow-gray-500/50 rounded-lg p-10 mx-auto transition-all mb-3">
                    <div class="flex gap-2">
                         <i class="fas fa-thumbs-up text-amber-500 text-3xl"></i>
                         <div class="flex flex-col items-start">
                              <h1 class="font-bold text-3xl patrick">
                                   100% Halal
                              </h1>
                              <p>Trusted for consumption</p>
                         </div>
                    </div>
               </div>
               <div class="hover:shadow-xl hover:shadow-gray-500/50 rounded-lg p-10 mx-auto transition-all mb-3">
                    <div class="flex gap-2">
                         <i class="fas fa-flask text-amber-500 text-3xl"></i>
                         <div class="flex flex-col items-start">
                              <h1 class="font-bold text-3xl patrick">
                                   Chemical-Free
                              </h1>
                              <p>Safe to drink</p>
                         </div>
                    </div>
               </div>
          </div>
     <script>
          $(window).on('load', function () {
               gsap.from('#queen', {
                    x: -50,
                    duration: 2,
                    ease: 'back',
                    opacity: 0
               })
               gsap.from('#online', {
                    x: -50,
                    duration: 2,
                    delay: 0.1,
                    ease: 'back',
                    opacity: 0
               })
               gsap.to('#text', {
                    duration: 2,
                    text: "Queen boba tastes good and fresh, this delicious taste is obtained from the addition of savory coconut milk and sweet liquid sugar so that when served with boba it creates a delicious taste that is liked by Indonesian people."
               })
          })

          gsap.set('#red, #vanilla', {
               x: 360,
               opacity: 0
          })
          gsap.set('#matcha, #taro', {
               x: -360,
               opacity: 0
          })
          gsap.set('#coklat, #bubble', {
               y: 285,
               opacity: 0
          })

          $(document).ready(function () {
               $(window).scroll(function () { 
                    if ($(this).scrollTop() > screen.height * 0.9) {
                         gsap.to('#matcha', {
                              duration: 5,
                              ease: 'back',
                              opacity: 1,
                              x: 0
                         })
                         gsap.to('#red', {
                              duration: 5,
                              ease: 'back',
                              opacity: 1,
                              x: 0
                         })
                         gsap.to('#coklat', {
                              duration: 5,
                              ease: 'back',
                              opacity: 1,
                              y: 0
                         })
                    }
                    if ($(this).scrollTop() > screen.height * 1.2) {
                         gsap.to('#taro', {
                              duration: 5,
                              ease: 'back',
                              opacity: 1,
                              x: 0
                         })
                         gsap.to('#vanilla', {
                              duration: 5,
                              ease: 'back',
                              opacity: 1,
                              x: 0
                         })
                         gsap.to('#bubble', {
                              duration: 5,
                              ease: 'back',
                              opacity: 1,
                              y: 0
                         })
                    }
               })
          })
     </script>
</x-index-layout>