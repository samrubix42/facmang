<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobApplication extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return HasMany<JobApplied, $this>
     */
    public function appliedCandidates(): HasMany
    {
        return $this->hasMany(JobApplied::class, 'job_id');
    }
}
