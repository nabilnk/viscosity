@extends('layouts.admin')
@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Asset</h1>
        <form action="{{ route('admin.assets.update', $asset) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                <select id="type" name="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="track_record" @selected( $asset->type === 'track_record')>Track Record</option>
                    <option value="our_team" @selected($asset->type === 'our_team')>Our Team</option>
                </select>
                @error('type')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="name-container"  @if($asset->type != 'our_team') style="display:none;" @endif >
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{$asset->name}}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="position-container"  @if($asset->type != 'our_team') style="display:none;" @endif>
                <label for="position" class="block text-gray-700 text-sm font-bold mb-2">Position</label>
                <input type="text" id="position" name="position" value="{{$asset->position}}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('position')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

           <div class="image-container"  @if($asset->type != 'track_record') style="display:none;" @endif>
             <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
             <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               @if ($asset->image)
                <img src="{{ asset('storage/' . $asset->image) }}" alt="Image" style="max-width: 200px; height: auto;" class="mt-4">
                 @endif

             @error('image')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
             @enderror
           </div>
           <div class="documentation-container" @if($asset->type != 'track_record') style="display:none;" @endif>
             <label for="documentation" class="block text-gray-700 text-sm font-bold mb-2">Documentation Image</label>
              <input type="file" id="documentation" name="documentation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @if ($asset->documentation)
                <img src="{{ asset('storage/' . $asset->documentation) }}" alt="Documentation" style="max-width: 200px; height: auto;" class="mt-4">
                 @endif
             @error('documentation')
               <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
          </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Update Asset
                </button>
                <a href="{{ route('admin.assets.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
@push('scripts')
    <script>
      const typeSelect = document.getElementById('type');
      const nameContainer = document.querySelector('.name-container');
      const positionContainer = document.querySelector('.position-container');
      const imageContainer = document.querySelector('.image-container');
      const docContainer = document.querySelector('.documentation-container');

      function toggleFields() {
        const selectedType = typeSelect.value;
           // Sembunyikan semua field
        nameContainer.style.display = 'none';
        positionContainer.style.display = 'none';
        imageContainer.style.display = 'none';
        docContainer.style.display = 'none';

        if (selectedType === 'track_record') {
            // Display only image and documentation for Track Record
            imageContainer.style.display = 'block';
            docContainer.style.display = 'block';
        } else if (selectedType === 'our_team') {
            // Display name, position, and image for Our Team
            nameContainer.style.display = 'block';
            positionContainer.style.display = 'block';
            imageContainer.style.display = 'block';
        }
      }

       // Panggil saat halaman diload
       toggleFields();

      // Panggil fungsi saat pilihan berubah
      typeSelect.addEventListener('change', toggleFields);
    </script>
    @endpush
@endsection