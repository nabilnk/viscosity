<?php

namespace App\Http\Controllers;

use App\Models\Nofreq;
use Illuminate\Http\Request;

class NofreqController extends Controller
{
    public function index()
    {
        $nofreqs = Nofreq::all();
        return view('admin.nofreqs.index', compact('nofreqs'));
    }

    public function create()
    {
        return view('admin.nofreqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'youtube_link'=>'required|url',
        ]);

        Nofreq::create($request->all());
        return redirect()->route('admin.nofreqs.index')->with('success','Nofreq added');
    }

    public function edit(Nofreq $nofreq)
    {
        return view('admin.nofreqs.edit', compact('nofreq'));
    }

    public function update(Request $request, Nofreq $nofreq)
    {
        $request->validate([
            'title'=>'required',
            'youtube_link'=>'required|url',
        ]);

        $nofreq->update($request->all());
        return redirect()->route('admin.nofreqs.index')->with('success','Nofreq updated');
    }

    public function destroy(Nofreq $nofreq)
    {
        $nofreq->delete();
        return redirect()->route('admin.nofreqs.index')->with('success','Nofreq deleted');
    }
}