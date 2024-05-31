@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create Product</h1>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description:</label>
                <textarea name="description" class="form-input mt-1 block w-full" required></textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price:</label>
                <input type="number" step="0.01" name="price" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock:</label>
                <input type="number" name="stock" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="categories" class="block text-gray-700">Categories:</label>
                <select name="categories[]" multiple class="form-select mt-1 block w-full">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
