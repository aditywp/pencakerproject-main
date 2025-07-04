<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;

class LowonganPublikController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::latest()->take(9)->get(); // Ambil 9 teratas
        return view('public.lowongan.index', compact('vacancies'));
    }
}
