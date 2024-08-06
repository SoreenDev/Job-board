<?php

namespace App\Http\Controllers;

use App\Repositorys\MyJobApplicationRepository\MyJobApplicationRepositoryInterface;

class MyJobApplicationController extends Controller
{
    protected MyJobApplicationRepositoryInterface $repository ;
    public function __construct(MyJobApplicationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $user =$this->repository->getAll(auth()->user());
//        dd($user[0]->job->job_applications_count);
        return view('my_job_application.index' , ['applications' => $this->repository->getAll(auth()->user())]);
    }

    public function destroy(string $id)
    {
        //
    }
}
