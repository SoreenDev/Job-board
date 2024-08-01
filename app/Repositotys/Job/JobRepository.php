<?php
namespace App\Repositotys\Job;

use App\Models\Job;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

class JobRepository implements JobRepositoryInterface
{
    public function filter( array $filters)
    {
        return Job::query()->when($filters['search'] ?? null,function ($query, $search)
        {
            $query->where(function($query) use ($search) {
                    $query
                        ->where('title','like',"%".$search."%")
                        ->orWhere('description','like',"%".$search."%");
            });
        })
            ->when($filters['min_salary'] ?? null, fn ($query , $min_salary) => $query->where('salary', '>=', $min_salary))

            ->when($filters['max_salary'] ?? null, fn ($query , $max_salary) => $query->where('salary', '<=', $max_salary))

            ->when($filters['experience'] ?? null, fn ($query , $experience) => $query->where('experience',$experience))

            ->when($filters['category'] ?? null, fn ($query , $category) => $query->where('category',$category))

            ->get();
    }
}
