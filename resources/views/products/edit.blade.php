@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description:</label>
                <textarea name="description" class="form-input mt-1 block w-full" required>{{ $product->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price:</label>
                <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock:</label>
                <input type="number" name="stock" value="{{ $product->stock }}" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="categories" class="block text-gray-700">Categories:</label>
                <select name="categories[]" multiple class="form-select mt-1 block w-full">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
