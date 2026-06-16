<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    public function run(): void
    {
        $employer = User::create([
            'name' => 'Test Employer',
            'email' => 'employer@test.com',
            'password' => bcrypt('password'),
            'role' => 'employer',
        ]);

        $company = Company::create([
            'user_id' => $employer->id,
            'name' => 'Acme Corp',
            'about' => 'A test company',
        ]);

        Job::create([
            'company_id' => $company->id,
            'created_by' => $employer->id,
            'title' => 'Laravel Developer',
            'category' => 'Engineering',
            'job_type' => 'full-time',
            'experience_level' => 'mid',
            'description' => 'We need a Laravel dev',
            'country' => 'India',
        ]);
    }
}