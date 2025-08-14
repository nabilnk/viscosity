<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use Illuminate\Http\Request;

class TalentController extends Controller
{
    public function index()
    {
        $talents = Talent::all();
        return view('admin.talents.index', compact('talents'));
    }

    public function create()
    {
        return view('admin.talents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'photo'=>'required|image',
            'description'=>'required'
        ]);

        $path = $request->file('photo')->store('talents','public');

        Talent::create([
            'name'=>$request->name,
            'photo'=>$path,
            'description'=>$request->description,
        ]);

        return redirect()->route('admin.talents.index')->with('success','Talent added');
    }

    public function edit(Talent $talent)
    {
        return view('admin.talents.edit', compact('talent'));
    }

    public function update(Request $request, Talent $talent)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'photo'=>'image|nullable',
        ]);

        $data = $request->only(['name','description']);
        if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('talents','public');
        }

        $talent->update($data);

        return redirect()->route('admin.talents.index')->with('success','Talent updated');
    }

    public function destroy(Talent $talent)
    {
        $talent->delete();
        return redirect()->route('admin.talents.index')->with('success','Talent deleted');
    }
}
