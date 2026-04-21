<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SuperAdminAuthController extends Controller
{
    public function dashboard()
    {
        return view('superadmin.dashboard', [
            'user' => Auth::user(),
        ]);
    }
}
