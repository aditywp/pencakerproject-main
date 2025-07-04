<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.admin'); // pastikan file ini ada
    }

    public function statistik()
    {
        $totalUser = \App\Models\User::count();
        $totalLowongan = \App\Models\Vacancy::count();
        $totalLamaran = \App\Models\Application::count();

        return view('admin.statistik', compact('totalUser', 'totalLowongan', 'totalLamaran'));
    }
}
