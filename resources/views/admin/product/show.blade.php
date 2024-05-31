<x-app-layout>

    {{-- <div class="  py-8 mt-18">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[300px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">

                    <img src="/uploads/products/{{$product->image}}" alt="Medicine Photo" class="w-full h-full object-cover" />
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-black mb-2">{{ $product->name }}</h2>
                <h4 class="text-xl font-bold text-gray-600 mb-2">Category : {{ $product->category->name }}</h4>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-black ">Price :</span>
                        <span class="text-gray-600 dark:text-gray-600">$ {{ $product->price }}</span>
                    </div>
                    <div>
                        <span class="font-bold text-black ">Availability : </span>
                        @if ($product->stock)
                            <span class="text-green-500 ">In Stock</span>
                        @else
                            <span class="text-rose-600 ">Out of Stock</span>

                        @endif

                    </div>
                </div>

                <div>
                    <span class="font-bold text-black ">Product Description:</span>
                    <p class="text-gray-600 dark:text-gray-600 text-sm mt-2">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- component -->
<section class="text-gray-700 body-font overflow-hidden bg-white" style="margin-top: -60px">
  <div class="container px-5 py-24 mx-auto">
    <div class="lg:w-4/5 mx-auto flex flex-wrap">
      <img alt="Medicine Image" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="/uploads/products/{{$product->image}}">
      <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">



        <a href="{{ route('category.show', $product->category->slug) }}" class="text-sm title-font text-blue-500 tracking-widest">{{ $product->category->name }}</a>
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
        <div class="flex mb-4">
          <span class="flex items-center">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>

          </span>

          </span>
        </div>
        <p class="leading-relaxed">Fam locavore kickstarter distillery. Mixtape chillwave tumeric sriracha taximy chia microdosing tilde DIY. XOXO fam indxgo juiceramps cornhole raw denim forage brooklyn. Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle austin listicle pour-over, neutra jean shorts keytar banjo tattooed umami cardigan.</p>
        <div class="flex mt-6 items-center pb-5  border-gray-200 mb-5">

        <div class="flex">
          <span class="title-font font-medium text-2xl text-gray-900">$ {{ $product->price }}</span>

        </div>
      </div>
    </div>
  </div>
</section>

    <!-- component -->
    {{-- <section class="text-gray-700 body-font overflow-hidden bg-white" style="margin-top: -60px; display: flex; justify-content: center; padding-left:140px;">
        <div class="container px-5 py-24 mx-auto" style="max-width: 1500px;">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="Medicine Image" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="/uploads/products/{{$product->image}}" style="width: 400px; height: 300px;">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-1 lg:mt-0">
                    <a href="{{ route('category.show', $product->category->slug) }}" class="text-sm title-font text-blue-500 tracking-widest">{{ $product->category->name }}</a>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
                    <div class="flex mb-4">
                        <span class="flex items-center">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                        </span>
                    </div>
                    <p class="leading-relaxed">Fam locavore kickstarter distillery. Mixtape chillwave tumeric sriracha taximy chia microdosing tilde DIY. XOXO fam indxgo juiceramps cornhole raw denim forage brooklyn. Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle austin listicle pour-over, neutra jean shorts keytar banjo tattooed umami cardigan.</p>
                    <div class="flex mt-6 items-center pb-5 border-gray-200 mb-5">
                        <div class="flex">
                            <span class="title-font font-medium text-2xl text-gray-900">$ {{ $product->price }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


</x-app-layout>
