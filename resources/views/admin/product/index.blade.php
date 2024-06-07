@extends('backend.layouts.app')

@section('content')

<section id="main" class="section">

    <div class="container ">
        <div class="px-4 sm:px-6 lg:px-8 bg-white pt-4">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 mb-5"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 5.652a.5.5 0 010 .707L9.707 10l4.641 4.641a.5.5 0 11-.707.707L9 10.707l-4.641 4.641a.5.5 0 11-.707-.707L8.293 10 3.652 5.359a.5.5 0 01.707-.707L9 9.293l4.641-4.641a.5.5 0 01.707 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
            @endif

            <div class="sm:flex sm:items-center ">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Products</h1>
                    <p class="mt-2 text-sm text-gray-700">
                        A list of all the products in your account including their name, slug and actions.
                    </p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <a href="{{ route('product.create') }}"
                        class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Create Product
                    </a>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Name</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Category</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Slug</th>
                                    {{-- <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Description</th> --}}
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Image</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Actions</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($product as $Product)
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                            {{ $Product->id }}</td>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                            {{ $Product->name }}</td>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                            {{ $Product->category->name }}</td>


                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                            {{ $Product->slug }}</td>

                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                            {{ $Product->image }}</td>

                                        <td
                                            class="whitespace-nowrap py-4 pl-5 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                            <div class="flex gap-2">

                                                <a href="{{ route('product.edit', $Product->id) }}"
                                                    style="display: inline-block; padding: 0.5rem 1rem; height: 2rem; line-height: 1.5rem;"
                                                    class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Edit</a>
                                                <form
                                                    action="{{ route('product.destroy', $Product->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this product?');"
                                                    >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                    style="display: inline-block; padding: 0.5rem 1rem; height: 2rem; line-height: 1.5rem;"
                                                    class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                        {{-- <td class="whitespace-nowrap py-4 pl-5 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
    <div class="flex gap-2">
        <a href="{{ route('product.edit', $Product->id) }}"
            style="display: inline-block; padding: 0.5rem 1rem; font-size: 0.75rem; font-weight: 600; color: #1a202c; background-color: #fff; border: 1px solid #d1d5db; border-radius: 0.25rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); text-align: center; vertical-align: middle; height: 2.5rem; line-height: 1.5rem;">
            Edit
        </a>
        <form action="{{ route('product.destroy', $Product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                style="display: inline-block; padding: 0.5rem 1rem; font-size: 0.75rem; font-weight: 600; color: #1a202c; background-color: #fff; border: 1px solid #d1d5db; border-radius: 0.25rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); text-align: center; vertical-align: middle; height: 2.5rem; line-height: 1.5rem;">
                Delete
            </button>
        </form>
    </div>
</td> --}}



                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{ $product->links() }}
    </div>
</section>
{{-- </x-app-layout> --}}
