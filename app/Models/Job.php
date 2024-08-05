<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;
    public static array $experience = ['junior','mid_level','senior'];
    public static array $category = ['Finance','sales','Marketing','it'];

    public function employer() : BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobapplication() : HasMany
    {
        return $this->hasMany(JobApplication::class);
    }
}
