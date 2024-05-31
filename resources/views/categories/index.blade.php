@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-4">Create New Category</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif
        <table class="table-auto w-full">
            <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class="border px-4 py-2">{{ $category->name }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
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
@endsection
