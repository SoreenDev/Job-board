<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\authRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(authRequest $request)
    {
        $remember = $request->filled('remember');
        if (Auth::attempt($request->only('email', 'password',$remember)))
            return redirect()->intended('/');

        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    public function destroy()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect('/');
    }
}
