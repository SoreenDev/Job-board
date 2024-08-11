<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Job' => '#' ]" />
    <div class="mb-8 text-right">
        <x-link-buttum href="{{ route('my-jobs.create') }}"> add new</x-link-buttum>
    </div>
    @forelse($jobs as $job)
        <div class="text-xs text-slate-500">
            <x-job-card :$job >

                <div class="flex items-center justify-between text-sm text-slate-500">
                   @forelse($job->job_applications as $application)
                        <div>
                            <div>
                                {{ $application->user->name }}
                            </div>
                            <div>
                                {{ $application->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div>
                            <div> {{ number_format($application->salary) }}</div>
                            <div> Download cv</div>
                        </div>
                    @empty
                        <div>no application yet</div>
                   @endforelse
                </div>
                <div class=" mb-4 flex justify-between">
                    <div class="mt-4 flex space-x-2">
                        <x-link-buttum href="{{ route('my-jobs.edit' ,$job) }}"> edite</x-link-buttum>
                    </div>
                    <div class="mt-4 flex space-x-2">
                        <form action="{{ route('my-jobs.destroy' , $job) }}" method="POST">
                            @csrf @method('DELETE')
                            <x-button> Delete</x-button>
                        </form>
                    </div>
                </div>
            </x-job-card>
        </div>
    @empty

        <div class="rounded-md border border-dashed text-slate-200 border-slate-300 p-8">
            <div class="text-center font-medium">
                No job yet
            </div>
            <div class="text-center">
                Go the create first job
                <a class="text-blue-500 hover:underline" href="{{ route('my-jobs.create') }}">here !</a>
            </div>
        </div>

    @endforelse
</x-layout>
