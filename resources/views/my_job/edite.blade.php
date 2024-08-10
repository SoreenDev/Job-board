<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index') , 'Edite' => '#' ]" />
    <x-card class="mt-8">
        <form action="{{ route('my-jobs.update',$job ) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" >Title</x-label>
                    <x-text-input name="title" :value="$job->title" />
                </div>
                <div>
                    <x-label for="location" >Location</x-label>
                    <x-text-input name="location" :value="$job->location"/>
                </div>
                <div class="col-span-2">
                    <x-label for="salary" >Salary</x-label>
                    <x-text-input name="salary" type="number" :value="$job->salary" />
                </div>
                <div class="col-span-2">
                    <x-label for="description" >Description</x-label>
                    <x-text-input name="description" type="textarea" :value="$job->description" />
                </div>
                <div>
                    <x-label for="experience" >Experience</x-label>
                    <x-radio-group name="experience" :options="\App\Models\Job::$experience" :value="$job->experiense"  :all_option="false"/>
                </div>
                <div>
                    <x-label for="category" >Category</x-label>
                    <x-radio-group name="category" :options="\App\Models\Job::$category" :value="$job->category" :all_option="false" />
                </div>
                <div class="col-span-2 mt-4">
                    <x-button  class="w-full">
                        Edite job
                    </x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
