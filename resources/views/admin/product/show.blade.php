<x-app-layout>

    <div class="  py-8 mt-18">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[300px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                    {{-- <img class="w-full h-full object-cover" src="https://cdn.pixabay.com/photo/2020/05/22/17/53/mockup-5206355_960_720.jpg" alt="Product Image"> --}}
                    <img src="/uploads/products/{{$product->image}}" alt="Medicine Photo" class="w-full h-full object-cover" />
                </div>
                {{-- <div class="flex -mx-2 mb-4">
                    <div class="w-1/2 px-2">
                        <button class="w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Add to Cart</button>
                    </div>
                    <div class="w-1/2 px-2">
                        <button class="w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600">Add to Wishlist</button>
                    </div>
                </div> --}}
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-black mb-2">{{ $product->name }}</h2>
                <h4 class="text-xl font-bold text-gray-600 mb-2">Category : {{ $product->category->name }}</h4>
                {{-- <p class="text-gray-600  text-sm mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                    ante justo. Integer euismod libero id mauris malesuada tincidunt.
                </p> --}}
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
                {{-- <div class="flex -mx-2 mb-4 ">
                    <div class="w-1/2 px-2 mt-20" >
                        <button class="w-full bg-blue-500  text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Add to Cart</button>
                    </div>
                    <div class="w-1/2 px-2 mt-20">
                        <button class="w-full bg-blue-500  text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600">Add to Wishlist</button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

</x-app-layout>
