<?php

namespace App\Http\Controllers; // Atau App\Http\Controllers\Admin

use App\Models\AssetHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssetHomeController extends Controller
{
    public function index(Request $request)
    {
        // Tentukan filter yang aktif. Defaultnya adalah 'tra_docs'.
        $activeFilter = $request->input('filter', 'tra_docs');

        $query = AssetHome::query();

        // Logika untuk mengambil data berdasarkan filter
        if ($activeFilter == 'tra_docs') {
            // Jika filter adalah 'tra_docs', ambil data 'track_record' DAN 'documentation'
            $query->whereIn('type', ['track_record', 'documentation']);
        } else {
            // Untuk filter lain ('team', 'collaboration'), ambil data sesuai tipenya
            $query->where('type', $activeFilter);
        }

        // Urutkan berdasarkan tipe (agar track_record dan documentation terkelompok) lalu tanggal
        $assets = $query->orderBy('type')->orderBy('created_at', 'desc')->get();

        // Kirim data aset yang sudah difilter dan nama filter yang aktif ke view
        return view('admin.assets.index', compact('assets', 'activeFilter'));
    }

    public function create()
    {
        return view('admin.assets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:track_record,documentation,team,collaboration',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/assets_home');
            $data['image'] = basename($path);
        }

        AssetHome::create($data);

        return redirect()->route('admin.assets.index')->with('success', 'Aset baru berhasil ditambahkan.');
    }

    public function edit(AssetHome $asset)
    {
        return view('admin.assets.edit', compact('asset'));
    }

    public function update(Request $request, AssetHome $asset)
    {
        $data = $request->validate([
            'type' => 'required|in:track_record,documentation,team,collaboration',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($asset->image) {
                Storage::delete('public/assets_home/' . $asset->image);
            }
            $path = $request->file('image')->store('public/assets_home');
            $data['image'] = basename($path);
        }

        $asset->update($data);

        return redirect()->route('admin.assets.index')->with('success', 'Aset berhasil diperbarui.');
    }

    public function destroy(AssetHome $asset)
    {
        if ($asset->image) {
            Storage::delete('public/assets_home/' . $asset->image);
        }
        
        $asset->delete();
        return redirect()->route('admin.assets.index')->with('success', 'Aset berhasil dihapus.');
    }
}