<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        return view('admin.dashboard', [
            'name' => auth()->check() ? auth()->user()->name : 'Admin User',
        ]);
    }
}
