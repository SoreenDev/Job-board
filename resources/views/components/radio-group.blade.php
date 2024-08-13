
{{--@if($allOption)--}}
{{--    <label for="{{ $name }}" class=" mb-1 flex items-center">--}}
{{--        <input type="radio" name="{{ $name }}" value="" @checked(!request($name))>--}}
{{--        <span class="ml-2">ALL</span>--}}
{{--    </label>--}}
{{--@endif--}}
@foreach( $options as $option)
    <label for="{{ $name }}" class=" mb-1 flex items-center">
        <input type="radio" name="{{'filter['  . $name. ']' }}" value="{{ $option }}" @checked($option === request($name))>
        <span class="ml-2">{{ ucfirst($option) }}</span>
    </label>
@endforeach
@error($name)
<div class=" mt-1 text-red-500 text-sm">
    {{ "* ".$message }}
</div>
@enderror
