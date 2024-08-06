<?php
namespace App\Repositorys\MyJobApplicationRepository;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as query_Builder;

interface MyJobApplicationRepositoryInterface
{
    public function getAll(User $user) ;
}
