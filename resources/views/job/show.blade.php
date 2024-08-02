<x-layout>
    <x-breadcrumbs :$job :links="['Jobs'=> route('job.index'), $job->title => '#' ]"  class="mb-4"  />
    <x-job-card :$job />
    <x-card  class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            other {{$job->employer->company_name}} Jobs
        </h2>

        @foreach($job->employer->jobs as $other_job)
            <div class=" mb-4 flex justify-between">
                <div>
                    <div class="text-slate-700">
                        <a href="{{route('job.show',$other_job)}}">{{ $other_job->title }}</a>
                    </div>
                    <div class="text-xs">
                        {{ $other_job->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="text-xs">
                    {{ number_format($other_job->salary) }}
                </div>
            </div>
        @endforeach
    </x-card>
</x-layout>


