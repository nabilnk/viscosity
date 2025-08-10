<x-app-layout>
    {{-- Layer Background --}}
    <div class="fixed inset-0 z-[-1] grayscale">
        {{-- Ganti dengan gambar background NOFREQ Anda --}}
        <img src="{{ asset('assets/nofreq/nofreq-bg.png') }}" class="w-full h-full object-cover" alt="NOFREQ Background">
        <div class="absolute inset-0 bg-black/70"></div>
    </div>

    <div class="relative z-10 pt-32 pb-20 min-h-screen">
        <div class="container mx-auto px-4">

            <h1 class="text-5xl font-bold text-center tracking-wider uppercase mb-16 text-white">LIVE SET</h1>

            {{-- GRID VIDEO --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Looping data video dari controller --}}
                @foreach($videos as $video)
                    <div class="relative aspect-video rounded-2xl overflow-hidden transition-shadow hover:shadow-xl">
                         {{-- Thumbnail video --}}
                        <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}" class="w-full h-full object-cover">

                        {{-- OVERLAY: Nama Video & Tombol Play --}}
                        <div class="absolute bottom-0 left-0 right-0 p-4 bg-black/30 backdrop-blur-md">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-white">{{ $video['title'] }}</span>
                            <button
                                data-youtube-id="{{ $video['youtube_id'] }}"
                                class="play-video bg-gradient-to-r from-purple-600 to-purple-400 border border-gray-700 text-white font-semibold py-2 px-4 rounded-full hover:scale-110 transition-transform">
                                PLAY
                            </button>
                            </div>
                            {{-- Garis Placeholder --}}
                            <div class="mt-2 h-1 bg-white/20 rounded-full"></div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

            {{-- Modal / Popup untuk menampilkan Video --}}
        <div id="videoModal" class="hidden fixed inset-0 bg-black/80 z-50 flex items-center justify-center">
            <div class="relative w-full max-w-4xl mx-auto">
                <button id="closeModalButton" class="absolute top-4 right-4 text-white text-4xl">&times;</button>
                <div id="videoContainer" class="aspect-video">
                    {{-- iFrame akan diisi oleh Javascript --}}
                </div>
            </div>
        </div>

        @push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.play-video').forEach(button => {
        button.addEventListener('click', function() {
            const youtubeId = this.dataset.youtubeId;
            const videoContainer = document.getElementById('videoContainer');
            const videoModal = document.getElementById('videoModal');
            const closeModalButton = document.getElementById('closeModalButton');

            // Buat iFrame untuk video YouTube
            videoContainer.innerHTML = `
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/\${youtubeId}?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            `;

            // Tampilkan modal
            videoModal.classList.remove('hidden');

             // Tambahkan event listener untuk tombol close
            closeModalButton.addEventListener('click', function() {
                // Hapus iFrame saat modal ditutup (penting!)
                videoContainer.innerHTML = '';
                videoModal.classList.add('hidden');
            });
        });
    });
});
</script>
@endpush
</x-app-layout>