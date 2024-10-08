<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes ;
    public static array $experience = ['junior','mid_level','senior'];
    public static array $category = ['Finance','sales','Marketing','it'];
    protected $fillable = ['title','description','experience','category','salary','employer_id','location'];
    public function employer() : BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function job_applications() : HasMany
    {
        return $this->hasMany(JobApplication::class);
    }
}
