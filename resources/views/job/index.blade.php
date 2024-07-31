<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs'=> route('job.index')]" />

    <x-card class="mb-4 text-sm">
        <form action="{{route("job.index")}}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">

                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input value="{{ request('search') }}" name="search" placeholder="Search for any text" />
                </div>

                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-2  ">
                        <x-text-input value="{{ request('min_salary') }}" name="min_salary" placeholder="From" />
                        <x-text-input value="{{ request('max_salary') }}" name="max_salary" placeholder="To" />
                    </div>
                </div>

                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group name="experience" :options="\App\Models\Job::$experience" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group name="category" :options="\App\Models\Job::$category" />
                </div>
                <x-button class="w-full">Filter</x-button>
                <x-link-buttum class="w-full" :href="route('job.index')">Reset</x-link-buttum>
            </div>
        </form>
    </x-card>

    @foreach($jobs as $job)
    <x-job-card :$job>
        <div>
            <x-link-buttum :href=" route('job.show',$job)">
                Show
            </x-link-buttum>
        </div>
    </x-job-card>
    @endforeach
</x-layout>
