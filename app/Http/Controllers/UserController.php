<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua user kecuali admin (jika perlu)
        $users = User::where('email', '!=', 'superadmin@example.com')->orderBy('created_at', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }
}