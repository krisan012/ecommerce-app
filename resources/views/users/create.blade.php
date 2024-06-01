@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Create User</h1>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 dark:text-gray-300">Name:</label>
                        <input type="text" name="name" class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-gray-300" required>
                        @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 dark:text-gray-300">Email:</label>
                        <input type="email" name="email" class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-gray-300" required>
                        @error('email')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 dark:text-gray-300">Password:</label>
                        <input type="password" name="password" class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-gray-300" required>
                        @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300">Confirm Password:</label>
                        <input type="password" name="password_confirmation" class="form-input mt-1 block w-full dark:bg-gray-700 dark:text-gray-300" required>
                        @error('password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="roles" class="block text-gray-700 dark:text-gray-300">Roles:</label>
                        <select name="roles[]" multiple class="form-select mt-1 block w-full dark:bg-gray-700 dark:text-gray-300">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('roles')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="items-center px-2 py-1 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
