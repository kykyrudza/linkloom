@props(['type' => 'text', 'name', 'placeholder' => '', 'label', 'autofocus' => false])

<div class="mb-5">
    <label for="{{ $name }}" class="block text-sm text-gray-500 mb-2">{{ $label }}</label>
    <div class="relative">
        @if($slot->isNotEmpty())
            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                {{ $slot }}
            </span>
        @endif
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            placeholder="{{ $placeholder }}"
            value="{{ old($name) }}"
            class="form-input-dark w-full text-sm {{ $slot->isNotEmpty() ? 'pl-10' : '' }} {{ $errors->has($name) ? 'border-red-300 bg-red-50' : '' }}"
            @if($autofocus) autofocus @endif
        >
    </div>
    @error($name)
        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
