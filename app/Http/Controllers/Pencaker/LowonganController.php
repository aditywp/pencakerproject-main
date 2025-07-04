<?php

namespace App\Http\Controllers\Pencaker;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongans = Vacancy::where('is_active', true)->latest()->get();
        return view('pencaker.lowongan.index', compact('lowongans'));
    }

    public function show($id)
    {
        $lowongan = Vacancy::findOrFail($id);
        return view('pencaker.lowongan.show', compact('lowongan'));
    }

    public function apply($id)
    {
        $user = Auth::user();
        $lowongan = Vacancy::findOrFail($id);

        // Cek apakah sudah pernah apply
        $sudahApply = Application::where('user_id', $user->id)->where('vacancy_id', $id)->exists();

        if ($sudahApply) {
            return redirect()->back()->with('error', 'Lo udah pernah apply ke lowongan ini.');
        }

        Application::create([
            'user_id' => $user->id,
            'vacancy_id' => $id,
            'status' => 'pending',
        ]);

        return redirect()->route('pencaker.lowongan.index')->with('success', 'Lamaran berhasil dikirim!');
    }
}

