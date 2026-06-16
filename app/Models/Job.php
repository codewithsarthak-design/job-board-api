<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'created_by',
        'title',
        'category',
        'job_type',
        'experience_level',
        'vacancies',
        'description',
        'responsibilities',
        'requirements',
        'benefits',
        'salary_min',
        'salary_max',
        'salary_currency',
        'salary_period',
        'location',
        'city',
        'state',
        'country',
        'is_remote',
        'application_deadline',
        'apply_url',
        'apply_email',
        'published_at',
    ];

    protected $casts = [
        'is_remote' => 'boolean',
        'application_deadline' => 'date',
        'published_at' => 'datetime',
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}