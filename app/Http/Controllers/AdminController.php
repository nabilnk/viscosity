<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

}
