@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="container mx-auto p-4 dark:bg-gray-900">
                <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Product Details</h1>
                <div class="bg-white dark:bg-gray-800 rounded shadow p-4">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100">{{ $product->name }}</h2>
                    <p class="text-gray-700 dark:text-gray-300">{{ $product->description }}</p>
                    <p class="text-gray-900 dark:text-gray-100">Price: ${{ $product->price }}</p>
                    <p class="text-gray-900 dark:text-gray-100">Stock: {{ $product->stock }}</p>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mt-4">Categories:</h3>
                    <ul class="list-disc list-inside text-gray-700 dark:text-gray-300">
                        @foreach($product->categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                    <div class="mt-4">
                        <a href="{{ route('products.edit', $product->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
