<nav {{$attributes}}>
    <ul class="flex space-x-4 text-slate-100">
        <li>
            <a href="#">
                Home
            </a>
        </li>
        <li>
            →
        </li>
        <li>
            <a href="{{ route('job.index') }}">
                Job
            </a>
        </li>
       @if(isset($job))
            <li>
                →
            </li>
            <li>
                <a href="#">
                    {{ $job->title }}
                </a>
            </li>
       @endif
    </ul>
</nav>
