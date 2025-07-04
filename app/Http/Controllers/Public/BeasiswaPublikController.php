<?php

namespace App\Http\Controllers\Public;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeasiswaPublikController extends Controller
{
    public function index()
    {
        $beasiswas = \App\Models\Beasiswa::latest()->get();
        return view('public.beasiswa.index', compact('beasiswas'));
    }
}
