<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{

    public function __construct()
    {

        $this->authorizeResource(Employer::class);
    }

    public function create()
    {
        return view('employer.create');
    }

    public function store(Request $request)
    {
        auth()->user()->employer()->create(
            $request->validate(['company_name' => ['required', 'string', 'max:255' , 'unique:employers,company_name']])
        );
        return redirect()->route('job.index')->with('success', 'Your employer account was successfully created.');
    }

       public function update(Request $request, string $id)
    {
        //
    }

}
