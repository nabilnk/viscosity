@extends('layouts.admin')

@section('content')
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
            <div class="container mx-auto p-6">
                <h1 class="text-xl font-bold mb-6">Edit Talent</h1>
                <form action="{{ route('admin.talents.update', $talent) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama Talent</label>
                        <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $talent->name }}" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">Foto Talent</label>
                        <input type="file" name="photo" id="photo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @if($talent->photo)
                            <img src="{{ asset('storage/'.$talent->photo) }}" alt="Talent Photo" class="h-20 mt-2">
                        @endif
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="documentation_photo">Foto Dokumentasi</label>
                            <input type="file" name="documentation_photo" id="documentation_photo" class="w-full border px-4 py-2">
                             @if($talent->documentation_photo)
                            <img src="{{ asset('storage/'.$talent->documentation_photo) }}" alt="Talent documentation_photo" class="h-20 mt-2">
                            @endif
                       
                     </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Deskripsi</label>
                        <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $talent->description }}</textarea>
                    </div>
                                        
                     <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                         Update
                         </button>
                    <a href="{{ route('admin.talents.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                         Cancel
                     </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection