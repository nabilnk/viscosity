<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VVIPController extends Controller
{
    public function index()
    {
        $status = Cache::get('vvip_status', 'coming_soon');
        return view('admin.vvip.index', compact('status'));
    }

    public function toggle(Request $request)
    {
        $status = $request->input('status');
        Cache::put('vvip_status', $status);
        return back()->with('success','VVIP status updated');
    }
}
