<x-layout>
    <x-breadcrumbs :$job :links="['Jobs'=> route('job.index'), $job->title => '#' ]"  class="mb-4"  />
    <x-job-card :$job >
        @can('apply',$job)
            <x-link-buttum href="{{ route('job.application.create',$job) }}">Apply</x-link-buttum>
        @else
            <div class=" mt-4 text-center text-sm text-slate-500 font-bold hover:text-red-900">
                You already applied to this job
            </div>
        @endcan
    </x-job-card>
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
                    ${{ number_format($other_job->salary) }}
                </div>
            </div>
        @endforeach
    </x-card>
</x-layout>


