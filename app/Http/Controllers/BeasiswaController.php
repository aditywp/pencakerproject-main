<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function index()
    {
        $beasiswas = Beasiswa::all();
        return view('admin.beasiswa.index', compact('beasiswas'));
    }

    public function create()
    {
        return view('admin.beasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'foto' => 'nullable|image|max:2048',
            'min_pendidikan' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('beasiswa_foto', 'public');
        }

        Beasiswa::create($data);
        return redirect()->route('admin.beasiswa.index')->with('success', 'Beasiswa ditambahkan!');
    }

    public function edit(Beasiswa $beasiswa)
    {
        return view('admin.beasiswa.edit', compact('beasiswa'));
    }

    public function update(Request $request, Beasiswa $beasiswa)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'foto' => 'nullable|image|max:2048',
            'min_pendidikan' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('beasiswa_foto', 'public');
        }

        $beasiswa->update($data);
        return redirect()->route('admin.beasiswa.index')->with('success', 'Beasiswa diperbarui!');
    }

    public function destroy(Beasiswa $beasiswa)
    {
        $beasiswa->delete();
        return redirect()->back()->with('success', 'Beasiswa dihapus!');
    }
}
