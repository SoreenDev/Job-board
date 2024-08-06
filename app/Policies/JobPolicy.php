<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    /**
     * Determine whether the user can view any models.
     * @param User|null $user
     * @return bool
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     * @param User|null $user
     * @param Job $job
     * @return bool
     */
    public function view(?User $user, Job $job): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return false ;
    }

    /**
     * Determine whether the user can update the model.
     * @param User $user
     * @param Job $job
     * @return bool
     */
    public function update(User $user, Job $job): bool
    {
        return false ;
    }

    /**
     * Determine whether the user can delete the model.
     * @param User $user
     * @param Job $job
     * @return bool
     */
    public function delete(User $user, Job $job): bool
    {
        return false ;
    }

    /**
     * Determine whether the user can restore the model.
     * @param User $user
     * @param Job $job
     * @return bool
     */
    public function restore(User $user, Job $job): bool
    {
        return false ;
    }

    /**
     * Determine whether the user can permanently delete the model.
     * @param User $user
     * @param Job $job
     * @return bool
     */
    public function forceDelete(User $user, Job $job): bool
    {
        return false ;
    }

    /**
     * @param User $user
     * @param Job $job
     * @return bool
     */
    public function apply(User $user, Job $job): bool
    {
        return ! $job->job_applications()->pluck('user_id')->contains($user->id) ;
    }
}
