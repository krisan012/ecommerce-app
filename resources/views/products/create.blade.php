@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="">
                    <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Create Product</h1>
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300">Name:</label>
                            <input type="text" name="name" class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-gray-300" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 dark:text-gray-300">Description:</label>
                            <textarea name="description" class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-gray-300" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 dark:text-gray-300">Price:</label>
                            <input type="number" step="0.01" name="price" class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-gray-300" required>
                        </div>
                        <div class="mb-4">
                            <label for="stock" class="block text-gray-700 dark:text-gray-300">Stock:</label>
                            <input type="number" name="stock" class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-gray-300" required>
                        </div>
                        <div class="mb-4">
                            <label for="categories" class="block text-gray-700 dark:text-gray-300">Categories:</label>
                            <select name="categories[]" multiple class="form-select mt-1 block w-full dark:bg-gray-700 dark:text-gray-300">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
