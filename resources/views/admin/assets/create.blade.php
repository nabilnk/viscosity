@extends('layouts.admin')
@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Create New Asset</h1>
        <form action="{{ route('admin.assets.store') }}" method="POST" enctype="multipart/form-data"
              class="space-y-4">
            @csrf

            <div>
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                <select id="type" name="type"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="track_record">Track Record</option>
                    <option value="our_team">Our Team</option>
                </select>
                @error('type')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Name (Our Team only) --}}
            <div id="name-group" style="display: none;">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" id="name" name="name"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Position (Our Team only) --}}
            <div id="position-group" style="display: none;">
                <label for="position" class="block text-gray-700 text-sm font-bold mb-2">Position</label>
                <input type="text" id="position" name="position"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('position')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image (All) --}}
            <div id="image-group">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                <input type="file" id="image" name="image"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('image')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Documentation (Track Record only) --}}
            <div id="documentation-group" style="display: none;">
                <label for="documentation" class="block text-gray-700 text-sm font-bold mb-2">Documentation</label>
                <input type="file" id="documentation" name="documentation"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('documentation')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
           
            
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Add Asset
                </button>
                <a href="{{ route('admin.assets.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            const typeSelect = document.getElementById('type');
            const nameGroup = document.getElementById('name-group');
            const positionGroup = document.getElementById('position-group');
            const imageGroup = document.getElementById('image-group');
            const documentationGroup = document.getElementById('documentation-group');

            function toggleFields() {
                const selectedType = typeSelect.value;

                nameGroup.style.display = 'none';
                positionGroup.style.display = 'none';
                imageGroup.style.display = 'none';
                documentationGroup.style.display = 'none';

                if (selectedType === 'track_record') {
                    imageGroup.style.display = 'block';
                    documentationGroup.style.display = 'block';
                } else if (selectedType === 'our_team') {
                    nameGroup.style.display = 'block';
                    positionGroup.style.display = 'block';
                    imageGroup.style.display = 'block';
                }
            }

            toggleFields(); // Initialize on load
            typeSelect.addEventListener('change', toggleFields);
        </script>
    @endpush
@endsection