<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use Illuminate\Http\Request;

class LamaranAdminController extends Controller
{
    public function index()
    {
        $lamarans = Lamaran::with(['user', 'vacancy'])->latest()->get();
        return view('admin.lamaran.index', compact('lamarans'));
    }
}

