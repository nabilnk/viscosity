<?php

namespace App\Http\Controllers;

use App\Models\AssetHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssetHomeController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'track_record'); // Default ke 'track_record'

        $assets = AssetHome::when($type, function ($query, $type) {
            $query->where('type', $type);
        })->get();

        return view('admin.assets.index', compact('assets', 'type'));
    }

    public function create()
    {
        return view('admin.assets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:track_record,documentation,our_team',
            'name' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'documentation' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload dan simpan gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = Storage::disk('public')->put('assets', $request->file('image'));
        }
          // Upload dan simpan documentation
        $docPath = null;
        if ($request->hasFile('documentation')) {
            $docPath = Storage::disk('public')->put('assets', $request->file('documentation'));
        }


        AssetHome::create([
            'type' => $request->type,
            'name' => $request->name,
            'position' => $request->position,
            'image' => $imagePath, // Simpan path ke database
            'documentation' => $docPath // Simpan path ke database
        ]);

        return redirect()->route('admin.assets.index')
                        ->with('success','Berhasil Ditambahkan.');
    }

    public function edit(AssetHome $asset)
    {
         return view('admin.assets.edit',compact('asset'));
    }
    public function update(Request $request, AssetHome $asset)
    {
        $request->validate([
            'type' => 'required|in:track_record,documentation,our_team',
            'name' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              'documentation' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       $assetData = $request->except(['image','documentation']);
         // Proses upload gambar (jika ada)
        if ($request->hasFile('image')) {
            // Hapus gambar lama (jika ada)
            if ($asset->image) {
                Storage::disk('public')->delete($asset->image);
            }
           $assetData['image'] = $request->file('image')->store('assets', 'public');
        }
        if ($request->hasFile('documentation')) {
            // Hapus gambar lama (jika ada)
            if ($asset->documentation) {
                Storage::disk('public')->delete($asset->documentation);
            }
           $assetData['documentation'] = $request->file('documentation')->store('assets', 'public');
        }

       

        $asset->update($assetData);
         return redirect()->route('admin.assets.index')
                        ->with('success','Berhasil Diubah');
    }
     public function destroy(AssetHome $asset)
    {
          if ($asset->image) {
            Storage::disk('public')->delete($asset->image);
        }

         if ($asset->documentation) {
            Storage::disk('public')->delete($asset->documentation);
        }
        $asset->delete();

        return redirect()->route('admin.assets.index')
                        ->with('success','Berhasil Dihapus');
    }
}