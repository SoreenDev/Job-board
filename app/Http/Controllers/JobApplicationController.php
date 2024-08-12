<?php

namespace App\Http\Controllers;

use App\Http\Requests\jobApplication\StoreJobApplicationRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{

    public function create(Job $job)
    {
        return view('job_application.create', compact('job'));
    }

    public function store(StoreJobApplicationRequest $request  , Job $job)
    {
        $this->authorize('apply', [Job::class , $job]);
        $request->validated();
        $job->job_applications()->create([
            'user_id' => auth()->id(),
            'salary' => $request->input('expected_salary'),
            'cv_path' => $request->file('cv')->store('cvs','private'),
        ]);
        return redirect()->route('job.show',$job)->with('success', 'Job Application Submitted Successfully');
    }

}
