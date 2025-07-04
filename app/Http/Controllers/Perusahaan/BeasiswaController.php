<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beasiswa;
use Illuminate\Support\Facades\Auth;

class BeasiswaController extends Controller
{
    public function index()
    {
        $beasiswas = Beasiswa::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('perusahaan.beasiswa.index', compact('beasiswas'));
    }

    public function create()
    {
        return view('perusahaan.beasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'           => 'required|string|max:255',
            'deskripsi'       => 'required|string',
            'syarat'          => 'nullable|string',
            'deadline'        => 'required|date',
            'min_pendidikan'  => 'required|string|max:255',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'judul'          => $request->judul,
            'deskripsi'      => $request->deskripsi,
            'syarat'         => $request->syarat,
            'deadline'       => $request->deadline,
            'min_pendidikan' => $request->min_pendidikan,
            'email'          => Auth::user()->email,
            'no_telp'        => Auth::user()->no_telp ?? '-',
            'user_id'        => Auth::id(),
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('beasiswa_foto', 'public');
        }

        Beasiswa::create($data);

        return redirect()->route('perusahaan.beasiswa.index')->with('success', 'Beasiswa berhasil ditambahkan!');
    }
}
