<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\VVIPSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {
        $exclusiveSetting = Setting::find('exclusive_coming_soon')->value ?? 'false';
        $vvipSetting = VVIPSetting::first()->is_active ?? true; // Ambil status VVIP
        
        return view('admin.settings.index', [
            'isExclusiveComingSoon' => ($exclusiveSetting === 'true'),
            'isVVIPActive' => $vvipSetting
        ]);
    }

    public function toggleExclusiveComingSoon()
    {
        $setting = Setting::firstOrCreate(
            ['key' => 'exclusive_coming_soon'],
            ['value' => 'false']
        );
        
        // Balik nilainya (true jadi false, false jadi true)
        $newValue = ($setting->value === 'true') ? 'false' : 'true';
        $setting->value = $newValue;
        $setting->save();

        return redirect()->route('admin.settings.index')->with('success', 'Status halaman Event Exclusive berhasil diubah.');
    }

    public function toggleVVIPStatus() {
        $setting = VVIPSetting::firstOrCreate(['id' => 1]);
        $setting->is_active = !$setting->is_active; // Membalik nilai boolean
        $setting->save();
        return redirect()->route('admin.settings.index')->with('success', 'Status halaman VVIP berhasil diubah.');
    }
}