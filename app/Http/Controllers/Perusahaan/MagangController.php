<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Magang;

class MagangController extends Controller
{
    public function index()
    {
        $magangs = Magang::where('user_id', auth()->id())->latest()->get();
        return view('perusahaan.magang.index', compact('magangs'));
    }

    public function create()
    {
        return view('perusahaan.magang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'keahlian' => 'required',
            'min_pendidikan' => 'required',
            'gaji' => 'nullable',
            'deskripsi' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('magang_foto', 'public');
        }

        $validated['user_id'] = auth()->id();

        Magang::create($validated);

        return redirect()->route('perusahaan.magang.index')->with('success', 'Magang berhasil ditambahkan.');
    }
}
