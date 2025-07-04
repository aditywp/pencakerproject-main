<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comerciel;
use Illuminate\Http\Request;

class ComercialController extends Controller
{
    public function index()
    {
        $comercials = Comerciel::latest()->get();
        return view('admin.comercial.index', compact('comercials'));
    }

    public function create()
    {
        return view('admin.comercial.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'kategori' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('comercial_gambar', 'public');
        }

        Comerciel::create($validated);

        return redirect()->route('admin.comercial.index')->with('success', 'Iklan berhasil ditambahkan');
    }

    public function edit(Comerciel $comercial)
    {
        return view('admin.comercial.edit', compact('comercial'));
    }

    public function update(Request $request, Comerciel $comercial)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'kategori' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('comercial_gambar', 'public');
        }

        $comercial->update($validated);

        return redirect()->route('admin.comercial.index')->with('success', 'Iklan berhasil diupdate');
    }

    public function destroy(Comerciel $comercial)
    {
        $comercial->delete();
        return back()->with('success', 'Iklan berhasil dihapus');
    }
}
