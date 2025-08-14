<?php

namespace App\Http\Controllers;

use App\Models\AssetHome;
use Illuminate\Http\Request;

class AssetHomeController extends Controller
{
    public function index()
    {
        $assets = AssetHome::all();
        return view('admin.assets.index', compact('assets'));
    }

    public function create()
    {
        return view('admin.assets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type'=>'required|in:track_record,documentation,team',
            'title'=>'required',
            'description'=>'nullable',
            'image'=>'image|nullable',
        ]);

        $path = $request->hasFile('image') ? $request->file('image')->store('assets','public') : null;

        AssetHome::create([
            'type'=>$request->type,
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$path,
        ]);

        return redirect()->route('admin.assets.index')->with('success','Asset added');
    }

    public function edit(AssetHome $asset)
    {
        return view('admin.assets.edit', compact('asset'));
    }

    public function update(Request $request, AssetHome $asset)
    {
        $request->validate([
            'type'=>'required|in:track_record,documentation,team',
            'title'=>'required',
            'description'=>'nullable',
            'image'=>'image|nullable',
        ]);

        $data = $request->only(['type','title','description']);
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('assets','public');
        }

        $asset->update($data);
        return redirect()->route('admin.assets.index')->with('success','Asset updated');
    }

    public function destroy(AssetHome $asset)
    {
        $asset->delete();
        return redirect()->route('admin.assets.index')->with('success','Asset deleted');
    }
}
