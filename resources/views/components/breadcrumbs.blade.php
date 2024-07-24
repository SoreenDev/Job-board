<nav {{$attributes}}>
    <ul class="flex space-x-4 text-slate-100">
        <li>
            <a href="#">
                Home
            </a>
        </li>

        @foreach($links as $lable => $link)
            <li>
                →
            </li>
            <li>
                <a href="{{$link}}">
                    {{$lable}}
                </a>
            </li>

        @endforeach
        {{--        <li>--}}
        {{--            <a href="{{ route('job.index') }}">--}}
        {{--                Job--}}
        {{--            </a>--}}
        {{--        </li>--}}
        {{--       @if(isset($job))--}}
        {{--            <li>--}}
        {{--                <a href="#">--}}
        {{--                    {{ $job->title }}--}}
        {{--                    →--}}
        {{--            </li>--}}
        {{--            <li>--}}
        {{--           </a>--}}
        {{--            </li>--}}
        {{--       @endif--}}
    </ul>
</nav>
