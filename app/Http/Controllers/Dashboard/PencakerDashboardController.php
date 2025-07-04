<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class PencakerDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.pencaker');
    }
}
