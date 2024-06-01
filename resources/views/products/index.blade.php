@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="">
                    <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Products</h1>
                    <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Create New Product</a>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success dark:text-gray-400">{{ $message }}</div>
                    @endif
                    <table class="table-auto w-full dark:bg-gray-800">
                        <thead>
                        <tr class="dark:text-gray-300">
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Stock</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="dark:text-gray-300">
                        @foreach ($products as $product)
                            <tr>
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2">{{ $product->description }}</td>
                                <td class="border px-4 py-2">{{ $product->price }}</td>
                                <td class="border px-4 py-2">{{ $product->stock }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Show</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto p-4 dark:bg-gray-900">

    </div>
@endsection
