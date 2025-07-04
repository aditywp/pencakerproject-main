<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magang;

class MagangController extends Controller
{
    public function index()
    {
        $magangs = Magang::all();
        return view('admin.magang.index', compact('magangs'));
    }

    public function create()
    {
        return view('admin.magang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keahlian' => 'required',
            'min_pendidikan' => 'required',
            'email' => 'required|email',
        ]);

        $request->merge(['user_id' => auth()->id()]);
        Magang::create($request->all());
        return redirect()->route('admin.magang.index')->with('success', 'Magang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $magang = Magang::findOrFail($id);
        return view('admin.magang.edit', compact('magang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'keahlian' => 'required',
            'min_pendidikan' => 'required',
            'email' => 'required|email',
        ]);

        $magang = Magang::findOrFail($id);
        $magang->update($request->all());

        return redirect()->route('admin.magang.index')->with('success', 'Magang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $magang = Magang::findOrFail($id);
        $magang->delete();

        return redirect()->route('admin.magang.index')->with('success', 'Magang berhasil dihapus!');
    }
}