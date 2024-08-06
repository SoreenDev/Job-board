
<x-layout>
    <x-breadcrumbs :links="['My Job application' => '#' ]" />
    @foreach($applications as $application)
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

                <div>2</div>
            </div>
        </x-job-card>

    @endforeach
</x-layout>
