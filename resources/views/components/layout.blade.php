<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    @keyframes boxAnomatio {
        from {
            left: 5%;
        }
        to {
            left: 95%;
        }
    }
    .body{
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(92,9,119,1) 37%, rgba(95,9,121,1) 57%, rgba(2,0,36,1) 100%);
    }
    .animation {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 40px;
        background: rgb(200,200,200);
        background: linear-gradient(90deg, rgba(200,200,200,0.05) 0%, rgba(255,255,255,0.20) 51%, rgba(200,200,200,0.05) 100%);
        animation: boxAnomatio 6s forwards;
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
                <li>
                    <a href="{{ route('my-jobs.index')}}">
                        My Job
                    </a>
                </li>
                <li class="text-indigo-300">
                    <a href="{{ route('my_job_application.index') }}">
                        {{ auth()->user()->name ?? 'Anonymous' }}{{ ' '.':'.' ' }}Application
                    </a>
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
    @if( session('success'))
        <div class="my-8 rounded-md border-l-8 border-green-600 bg-slate-50 p-4 text-green-700 bg-opacity-75">
            <p class="font-bold">Success !</p>
            <p> {{ session('success') }} </p>
        </div>
    @endif
    @if( session('error'))
        <div class="my-8 rounded-md border-l-8 border-red-600 bg-slate-50 p-4 text-red-700 bg-opacity-75">
            <p class="font-bold">Error !</p>
            <p> {{ session('error') }} </p>
        </div>
    @endif
    {{ $slot }}
</body>

</html>
