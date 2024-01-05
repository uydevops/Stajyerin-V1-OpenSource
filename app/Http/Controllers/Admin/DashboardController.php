<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;


class DashboardController extends Controller
{



  

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        return redirect()->route('login');
    }

    public function users()
    {
        $AllUsers = User::all();
        return view('admin.users', compact('AllUsers'));
    }
}
