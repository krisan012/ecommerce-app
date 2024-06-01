@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 dark:bg-gray-900">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Edit User</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 dark:text-gray-300">Name:</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-gray-300" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 dark:text-gray-300">Email:</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-gray-300" required>
            </div>
            <div class="mb-4">
                <label for="roles" class="block text-gray-700 dark:text-gray-300">Roles:</label>
                <select name="roles[]" multiple class="form-select mt-1 block w-full dark:bg-gray-700 dark:text-gray-300">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </form>
    </div>
@endsection
