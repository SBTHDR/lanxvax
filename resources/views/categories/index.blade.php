<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(Session::get('success'))
                        <div class="p-3 bg-green-200 mb-5">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <table class="w-full border-r border-b">
                        <tr>
                            <th class="border-l border-t text-left px-2 py-1">Name</th>
                            <th class="border-l border-t text-left px-2 py-1">Minimum Age</th>
                            <th class="border-l border-t text-left px-2 py-1">Actions</th>
                        </tr>
                        @foreach($categories as $category)
                            <tr>
                                <td class="border-l border-t text-left px-2 py-1">{{ $category->name }}</td>
                                <td class="border-l border-t text-left px-2 py-1">{{ $category->min_age }}</td>
                                <td class="border-l border-t text-left px-2 py-1">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="bg-indigo-500 rounded px-2 py-1 text-white text-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
