<x-layout>
    <x-breadcrumbs :$job :links="['Jobs'=> route('job.index'), $job->title => '#' ]"  class="mb-4"  />
    <x-job-card :$job />
</x-layout>


