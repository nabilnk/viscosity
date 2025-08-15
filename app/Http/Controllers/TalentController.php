<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TalentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $talents = Talent::all();
        return view('admin.talents.index', compact('talents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.talents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'description' => 'nullable|string',
            'documentation_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('talents', 'public');
        }

        $documentationPhotoPath = null;
        if ($request->hasFile('documentation_photo')) {
            $documentationPhotoPath = $request->file('documentation_photo')->store('talents', 'public');
        }

        Talent::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $photoPath,
            'documentation_photo' => $documentationPhotoPath,
        ]);

        return redirect()->route('admin.talents.index')->with('success', 'Talent created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Talent $talent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Talent $talent)
    {
        return view('admin.talents.edit', compact('talent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Talent $talent)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'documentation_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        $photoPath = $talent->photo;
        $documentationPhotoPath = $talent->documentation_photo;

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($talent->photo);
            $photoPath = $request->file('photo')->store('talents', 'public');
        }

        if ($request->hasFile('documentation_photo')) {
            Storage::disk('public')->delete($talent->documentation_photo);
            $documentationPhotoPath = $request->file('documentation_photo')->store('talents', 'public');
        }

        $talent->update([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $photoPath,
            'documentation_photo' => $documentationPhotoPath,
        ]);

        return redirect()->route('admin.talents.index')->with('success', 'Talent updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Talent $talent)
    {
        // Hapus foto utama (jika ada)
        if ($talent->photo) {
          Storage::disk('public')->delete($talent->photo);
        }
        // Hapus foto dokumentasi (jika ada)
        if ($talent->documentation_photo) {
            Storage::disk('public')->delete($talent->documentation_photo);
        }

        $talent->delete();

        return redirect()->route('admin.talents.index')->with('success', 'Talent deleted successfully!');
    }
}