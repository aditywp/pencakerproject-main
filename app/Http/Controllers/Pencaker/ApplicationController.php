<?php

namespace App\Http\Controllers\Pencaker;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with(['vacancy', 'vacancy.company'])
                        ->where('user_id', Auth::id())
                        ->latest()
                        ->get();

        return view('pencaker.applications.index', compact('applications'));
    }
}

