<?php
namespace App\Http\Controllers;

use App\Models\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TalentController extends Controller
{
    public function index() 
    {
        $talents = Talent::orderBy('name')->get();
        return view('admin.talents.index', compact('talents'));
    }
    public function create() 
    { 
        return view('admin.talents.create'); 
    }

    public function store(Request $request) 
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|max:2048',
            'description' => 'nullable|string',
            'documentation_photo' => 'required|image|max:2048',
        ]);
        $data['photo'] = $request->file('photo')->store('public/talents');
        $data['documentation_photo'] = $request->file('documentation_photo')->store('public/talents');
        Talent::create($data);
        return redirect()->route('admin.talents.index')->with('success', 'Talent baru berhasil dibuat.');
    }
    public function edit(Talent $talent) 
    { 
        return view('admin.talents.edit', compact('talent')); 
    
    }
    public function update(Request $request, Talent $talent) 
    {
        $data = $request->validate([ 'name' => 'required|string|max:255', 'description' => 'nullable|string', 'photo' => 'nullable|image|max:2048', 'documentation_photo' => 'nullable|image|max:2048' ]);
        if ($request->hasFile('photo')) {
            if ($talent->photo) Storage::delete($talent->photo);
            $data['photo'] = $request->file('photo')->store('public/talents');
        }
        if ($request->hasFile('documentation_photo')) {
            if ($talent->documentation_photo) Storage::delete($talent->documentation_photo);
            $data['documentation_photo'] = $request->file('documentation_photo')->store('public/talents');
        }
        $talent->update($data);
        return redirect()->route('admin.talents.index')->with('success', 'Talent berhasil diperbarui.');
    }

    public function destroy(Talent $talent) 
    {
        if ($talent->photo) Storage::delete($talent->photo);
        if ($talent->documentation_photo) Storage::delete($talent->documentation_photo);
        $talent->delete();
        return redirect()->route('admin.talents.index')->with('success', 'Talent berhasil dihapus.');
    }
}