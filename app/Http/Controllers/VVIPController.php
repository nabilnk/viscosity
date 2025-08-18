<?php
namespace App\Http\Controllers;
use App\Models\VVIPSetting;
use Illuminate\Http\Request;

class VVIPController extends Controller
{
    public function index() {
        $setting = VVIPSetting::firstOrCreate(['id' => 1]);
        return view('admin.vvip.index', compact('setting'));
    }
    public function update(Request $request) {
        $data = $request->validate([
            'rules' => 'nullable|string',
            'benefits' => 'nullable|string',
        ]);
        $setting = VVIPSetting::firstOrCreate(['id' => 1]);
        $setting->update($data);
        return redirect()->route('admin.vvip.index')->with('success', 'Konten VVIP berhasil diperbarui.');
    }
}

