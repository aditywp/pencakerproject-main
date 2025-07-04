<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class PerusahaanDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.perusahaan');
    }
}
