<x-layout>
    <x-breadcrumbs :links="['Jobs'=> route('job.index'), $job->title => route('job.show',$job) , 'Apply' => '#' ]"  class="mb-4" />
    <x-job-card :$job />
    <x-card>
        <h2 class="my-6 text-center text-4xl font-medium text-slate-800">
            Your Job Application
        </h2>
        <form action="{{ route('job.application.store' , $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="expected_salary" class="mb-2 block text-2xl font-medium text-slate-900"> Expect salary </label>
                <x-text-input type="number" name="expected_salary" class="mb-2" />
            </div>
            <div class="mb-4">
                <label for="cv" class="mb-2 block text-2xl font-medium text-slate-900"> Expect salary </label>
                <x-text-input type="file" name="cv" class="mb-2" />
            </div>
            <x-button class="w-full mb-4" href="" >Apply</x-button>
        </form>
    </x-card>
</x-layout>
