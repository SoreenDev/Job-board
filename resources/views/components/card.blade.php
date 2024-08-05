
<div {{ $attributes->merge(['class' => 'relative overflow-hidde rounded-md border border-slate-300 bg-white bg-opacity-90 p-4 shadow-sm']) }}>
{{ $slot }}
    <div class="animation"></div>
</div>
