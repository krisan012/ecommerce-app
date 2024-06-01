@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
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
                    <x-primary-button>Update</x-primary-button>
                </form>
            </div>
        </div>
    </div>
@endsection
