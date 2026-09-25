<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplied extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo<JobApplication, $this>
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(JobApplication::class, 'job_id');
    }
}
