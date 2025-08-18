@props([
    'class' => 'w-full h-64 rounded-md',
])

<div {{ $attributes->merge(['class' => "relative overflow-hidden $class"]) }} data-skeleton>
    <div class="absolute inset-0 animate-pulse bg-gray-700/50 skeleton-loader"></div>
    {{ $slot }}
</div>

@once
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll('[data-skeleton]').forEach(wrapper => {
                    const img = wrapper.querySelector('img');
                    const loader = wrapper.querySelector('.skeleton-loader');

                    if (!img) return;

                    const showImage = () => {
                        loader?.remove();
                        img.classList.remove('opacity-0');
                    };

                    if (img.complete) {
                        showImage();
                    } else {
                        img.addEventListener('load', showImage);
                    }
                });
            });
        </script>
    @endpush
@endonce
