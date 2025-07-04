<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Vacancy;
use App\Models\Application;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
        // Admin
        User::create([
            'name' => 'Admin Ojan',
            'email' => 'adminojan@email.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        // Pencaker
        User::create([
            'name' => 'Joko',
            'email' => 'joko123@email.com',
            'password' => bcrypt('password'),
            'role' => 'pencaker'
        ]);

        // Perusahaan
        $userPerusahaan = User::create([
            'name' => 'PT Maju Terus',
            'email' => 'perusahaan123@email.com.id',
            'password' => bcrypt('password'),
            'role' => 'perusahaan'
        ]);

        $company = Company::create([
            'user_id' => $userPerusahaan->id,
            'name' => 'PT Maju Terus',
            'address' => 'Jakarta',
            'phone' => '08123456789'
        ]);

        Vacancy::create([
            'company_id' => $company->id,
            'title' => 'Web Developer',
            'description' => 'Kerja remote, bisa rebahan',
            'location' => 'Remote',
            'deadline' => now()->addDays(10),
            'is_active' => true
        ]);
    }
}
