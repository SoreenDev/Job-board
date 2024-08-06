<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        return view('my_job_application.index' ,
            ['applications' => auth()->user()->jobapplication()->with('job','job.employer')->latest()->get()]
        );
    }

    public function destroy(string $id)
    {
        //
    }
}
