<p class="text-sm text-gray-500 mb-5">
    {{ $slot }}
    <a href="{{ $url ?? '#' }}" class="text-red-400 hover:text-red-300 transition-colors underline-offset-2 hover:underline">
        Click here
    </a>
</p>
