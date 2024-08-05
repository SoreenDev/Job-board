<x-layout>
    <x-breadcrumbs :links="['My Job application' => '#' ]" />
    @foreach($applications as $application)
        <x-job-card :job=" $application->job " />

    @endforeach
</x-layout>
