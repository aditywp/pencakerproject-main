<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('user')->get();
        return view('admin.company.index', compact('companies'));
    }

    public function create()
    {
        $users = User::where('role', 'perusahaan')->get();
        return view('admin.company.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:companies,user_id',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Company::create($request->all());
        return redirect()->route('admin.company.index')->with('success', 'Perusahaan berhasil ditambahkan.');
    }

    public function edit(Company $company)
    {
        $users = User::where('role', 'perusahaan')->get();
        return view('admin.company.edit', compact('company', 'users'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:companies,user_id,' . $company->id,
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $company->update($request->all());
        return redirect()->route('admin.company.index')->with('success', 'Perusahaan berhasil diperbarui.');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('admin.company.index')->with('success', 'Perusahaan berhasil dihapus.');
    }
}
