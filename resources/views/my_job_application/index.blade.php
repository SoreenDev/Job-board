
<x-layout>
    <x-breadcrumbs :links="['My Job application' => '#' ]" />
    @forelse($applications as $application)
        <x-job-card :job=" $application->job " >
            <div class="flex items-center justify-between text-sm text-slate-500">
                <div>
                   <div>
                       Applied {{ $application->created_at->diffForHumans() }}
                   </div>
                    <div>
                        Your asking salary ${{ number_format($application->salary) }}
                    </div>
                    <div>
                        Average asking salary ${{ number_format($application->job->job_applications_avg_salary) }}
                    </div>
                    <div>
                       Other {{ $application->job->job_applications_count-1 >1 ? '$applicants ' : '$applicant ' }}{{$application->job->job_applications_count-1}}

                    </div>
                </div>

                <div>
                    <form action="{{ route('my_job_application.destroy', $application) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <x-button class="hover:bg-red-400">Cancel</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty

            <div class="rounded-md border border-dashed text-slate-200 border-slate-300 p-8">
                <div class="text-center font-medium">
                    No job application yet
                </div>
                <div class="text-center">
                    Go fine some jobs
                    <a class="text-blue-500 hover:underline" href="{{ route('job.index') }}">here !</a>
                </div>
            </div>

    @endforelse
</x-layout>
