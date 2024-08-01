<?php

namespace App\Repositotys\Job;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
interface JobRepositoryInterface
{
    public function filter( array $filters);
}
