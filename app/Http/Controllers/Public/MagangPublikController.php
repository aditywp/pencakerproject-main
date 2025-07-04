<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Magang;

class MagangPublikController extends Controller
{
    public function index()
    {
        $magangs = Magang::latest()->get();
        return view('public.magang.index', compact('magangs'));
    }
}
