<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Talent;
use App\Models\Nofreq;
use App\Models\User;
use App\Models\AssetHome;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
         $assets = AssetHome::all();
        return view('admin.index', compact('users','assets'));
    }
     // Events CRUD METHODS
    public function eventsCreate()
    {
        return view('admin.events.create');
    }
        //Tambahkan kode dibawah ini, karena kodenya belum ada
   public function assetsIndex()
    {
        $assets = AssetHome::all();
        return view('admin.assets.index', compact('assets'));
    }

    public function assetsCreate()
    {
        return view('admin.assets.create');
    }

    public function assetsEdit(AssetHome $asset)
    {
        return view('admin.assets.edit', compact('asset'));
    }
}