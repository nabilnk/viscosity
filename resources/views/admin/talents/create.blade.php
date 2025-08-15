<x-admin-layout>

<div class="container mx-auto p-6">
    <h1 class="text-xl font-bold mb-6">Tambah Talent</h1>
    <form action="{{ route('admin.talents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block">Nama Talent</label>
            <input type="text" name="name" class="w-full border px-4 py-2" required>
        </div>
        <div>
            <label class="block">Foto Talent</label>
            <input type="file" name="photo" class="w-full border px-4 py-2" required>
        </div>
        <div>
            <label class="block">Deskripsi</label>
            <textarea name="description" class="w-full border px-4 py-2" required></textarea>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
</x-admin-layout>

