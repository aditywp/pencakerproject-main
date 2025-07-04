<?php

namespace App\Http\Controllers\Pencaker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;

class LamaranController extends Controller
{
    public function create(Vacancy $vacancy)
    {
        $alreadyApplied = Application::where('user_id', Auth::id())
            ->where('vacancy_id', $vacancy->id)
            ->exists();

        if ($alreadyApplied) {
            return redirect()->route('pencaker.dashboard', $vacancy->id)
                ->with('error', 'Lo udah pernah apply ke lowongan ini, tunggu hasilnya ya!');
        }

        return view('pencaker.apply', compact('vacancy'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vacancy_id' => 'required|exists:vacancies,id',
            'cv_file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $path = $request->file('cv_file')->store('cv', 'public');

        Application::create([
            'user_id' => Auth::id(),
            'vacancy_id' => $request->vacancy_id,
            'cv_file' => $path,
            'status' => 'pending',
        ]);

        return redirect()->route('pencaker.applications.index')->with('success', 'Lamaran berhasil dikirim!');
    }
}

