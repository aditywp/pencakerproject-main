<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusUpdateMail;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::where('company_id', Auth::user()->company->id)->get();
        return view('vacancies.index', compact('vacancies'));
    }

    public function create()
    {
        return view('vacancies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'deadline' => 'required|date',
        ]);

        Vacancy::create([
            'company_id' => Auth::user()->company->id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'deadline' => $request->deadline,
            'is_active' => true,
        ]);

        return redirect()->route('vacancies.index')->with('success', 'Lowongan berhasil ditambahkan!');
    }

    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.edit', compact('vacancy'));
    }

    public function update(Request $request, Vacancy $vacancy)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'deadline' => 'required|date',
        ]);

        $vacancy->update($request->all());

        return redirect()->route('vacancies.index')->with('success', 'Lowongan berhasil diperbarui!');
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->route('vacancies.index')->with('success', 'Lowongan berhasil dihapus!');
    }

    // ✅ Melihat pelamar dari 1 lowongan
    public function applicants($id)
    {
        $vacancy = Vacancy::with(['applications.user'])->findOrFail($id);

        if ($vacancy->company_id != Auth::user()->company->id) {
            abort(403, 'Akses ditolak');
        }

        return view('vacancies.applicants', compact('vacancy'));
    }

    // ✅ Update status lamaran
    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:accepted,rejected'
    ]);

    $application = Application::findOrFail($id);

    if ($application->vacancy->company_id != Auth::user()->company->id) {
        abort(403, 'Akses ditolak');
    }

    $application->status = $request->status;
    $application->save();

    // ✅ Kirim email ke pencaker via Mailtrap
    Mail::to($application->user->email)->send(
        new StatusUpdateMail($application->status, $application->vacancy)
    );

    return redirect()->back()->with('success', 'Status lamaran diperbarui & email dikirim!');
}
}
