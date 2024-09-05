
@props(['type' => 'text', 'name', 'placeholder' => '', 'label', 'autofocus' => false])

<div class="mb-4 md:mb-6">
    <label for="{{ $name }}" class="block text-white text-center text-opacity-100 md:text-2xl text-xl mb-2">{{ $label }}</label>
    <div class="relative">
        <div class="items-center">
            @if($slot->isNotEmpty())
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    {{ $slot }}
                </span>
            @endif
            <input
                type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $name }}"
                placeholder="{{ $placeholder }}"
                value="{{ old($name) }}"
                class="w-full {{ $slot->isNotEmpty() ? 'pl-10' : '' }} {{ $errors->has($name) ? 'rounded-t-2xl placeholder-white placeholder-opacity-80' : 'rounded-full active:ring-0 focus:ring-0 focus-visible:ring-0 placeholder-gray-400'}} p-3  bg-white bg-opacity-10  placeholder-opacity-100 focus:placeholder-opacity-50 focus:outline-none focus:ring-2 md:text-2xl text-xl"
                @if($autofocus) autofocus @endif
            >
        </div>
    </div>
    @error($name)
    <span class="w-full inline-flex items-center rounded-b-2xl  bg-red-400 bg-opacity-50 opacity-80 px-3 py-2 text-xl font-medium text-white">{{ $message }}</span>
    @enderror
</div>
