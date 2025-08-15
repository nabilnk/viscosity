<?php

namespace App\Http\Controllers;

use App\Models\VVIPSetting;
use Illuminate\Http\Request;

class VVIPController extends Controller
{
    public function index()
    {
        $vvipSetting = VVIPSetting::firstOrCreate([
            'id' => 1, // Assuming there's only one VVIP setting
        ], [
            'is_active' => false, // Default value
        ]);

        return view('admin.vvip.index', compact('vvipSetting'));
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'is_active' => 'required|boolean',
        ]);

        $vvipSetting = VVIPSetting::firstOrCreate(
             ['id' => 1],
             ['is_active' => false] 
        );
        $vvipSetting->is_active = $request->boolean('is_active');
        $vvipSetting->save();

        return back()->with('success', 'VVIP Coming Soon status toggled successfully!');
    }
}