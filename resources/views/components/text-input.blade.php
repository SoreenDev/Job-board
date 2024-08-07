@if($type === 'textarea')
    <textarea name="{{ $name }}" id="{{ $name }}">
      {{ old($name , $value) }}
    </textarea>
@else
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name , $value) }}" placeholder="{{ $placeholder }}"
        @class([
            'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-500 placeholder:text-slate-400 focus:ring-2',
            'ring-slate-500' => !$errors->has($name),
            'ring-red-500' => $errors->has($name),
    ])>
@endif
@error($name)
    <div class=" mt-1 text-red-500 text-sm">
        {{ $message }}
    </div>
@enderror
