<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    .body{
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(92,9,119,1) 37%, rgba(95,9,121,1) 57%, rgba(2,0,36,1) 100%);
    }
</style>
<body class="body mx-auto mt-10 max-w-2xl bg-gray-600 text-slate-700">

<nav class="mb-8 flex justify-between text-2xl font-medium text-neutral-50">
    <ul class=" flex space-x-2">
        <li>
            <a href="{{ route('job.index') }}">Home</a>
        </li>
    </ul>
    <ul class=" flex space-x-6">
        @auth
            <li class="text-indigo-300">
                {{ auth()->user()->name ?? 'Anonymous' }}
            </li>
            <li>
                <form action="{{ route('auth.destroy') }}" method="post">
                    @csrf @method('DELETE')

                    <button class="text-red-300">Logout</button>
                </form>
            </li>
        @else
            <li>
                <a href="{{ route('auth.create') }}">Sign in</a>
            </li>
        @endauth

    </ul>

</nav>

    {{ $slot }}
</body>

</html>
