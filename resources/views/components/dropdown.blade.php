@props(['align' => 'right', 'width' => '48', 'contentClasses' => ''])

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute z-50 mt-2 w-{{ $width }} rounded-md shadow-lg {{ $align == 'right' ? 'origin-top-right right-0' : 'origin-top-left left-0' }}"
            style="display: none;"
            @click="open = false">
        
        {{-- PERUBAHAN UTAMA DI SINI --}}
        <div class="rounded-md py-1 bg-zinc-800 border border-zinc-700">
            {{ $content }}
        </div>
    </div>
</div>