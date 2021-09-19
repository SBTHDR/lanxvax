<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Category Edit') }}
            </h2>
            <div class="min-w-max">
                <a href="{{ route('categories.index') }}" class="px-3 py-2 rounded bg-black text-white">Back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('categories.update', $category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="w-full text-sm font-bold text-gray-500">Category Name</label>
                            <input type="text" id="name" name="name" class="w-full border mt-1" value="{{ $category->name }}">
                        </div>
                        @error('name')
                            <p class="text-red-400 py-1 mb-2">
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="mb-3">
                            <label for="min_age" class="w-full text-sm font-bold text-gray-500">Min Age</label>
                            <input type="number" id="min_age" name="min_age" class="w-full border mt-1" value="{{ $category->min_age }}">
                        </div>
                        @error('min_age')
                        <p class="text-red-400 py-1 mb-2">
                            {{ $message }}
                        </p>
                        @enderror

                        <button type="submit" class="py-2 px-3 bg-black text-white rounded">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
