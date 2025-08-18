<x-app-layout>
    {{-- SECTION HERO --}}
    <section class=" relative pt-24 pb-20 px-4 text-center bg-black/60 backdrop-blur-sm">

        <x-skeleton class="mx-auto w-2/3 sm:w-1/2 md:w-2/5">
            <img src="{{ asset('assets/logo/viscosity-text.png') }}"
             alt="Viscosity Logo" 
             class="mx-auto w-2/3 sm:w-1/2 md:w-2/5 opacity-0 transition-opacity duration-500">
        </x-skeleton>

        <x-skeleton class="mx-auto my-6 w-96 h-auto rounded-xl shadow-lg">
            <img src="{{ asset('assets/home/hero-flyer.png') }}" 
            alt="Viscosity Flyer" 
            class="mx-auto my-6 w-96 h-auto rounded-xl shadow-lg opacity-0 transition-opacity duration-500">
        </x-skeleton>
        <p class="max-w-4xl mx-auto text-base md:text-lg text-gray-200 mt-6">
            Viscosity is an underground music and nightlife collective, rooted in the pulse of the rave scene and the raw 
            energy of after-hours culture. Since 2021, we’ve been curating gritty, high-intensity experiences through DJ-driven events,
            audiovisual showcases, and collaborations that blur the lines between sound, identity, and subculture. 
            Viscosity isn't just a party—it's a movement born in the dark, made to burn loud.
        </p>
    </section>

    {{-- SECTION TRACK RECORD AND DOCUMENTATION --}}
    <section class="py-20 px-4 space-y-16">
        <div>
            <h2 class="text-4xl font-bold text-center mb-12">Track Record Activity</h2>
            <div class="swiper swiper-activity overflow-visible">
                <div class="swiper-wrapper items-center">
                    <div class="swiper-slide" style="width: 70%">
                        <div class="bg-black/40 backdrop-blur-sm border border-gray-700/50 rounded-lg overflow-hidden">
                            <x-skeleton class="w-full h-96">
                                <img src="{{ asset('assets/home/hero-flyer.png') }}" 
                                alt="Track Record 1" 
                                class="w-full h-96 object-cover opacity-0 transition-opacity duration-500">
                            </x-skeleton>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width: 70%">
                        <div class="bg-black/40 backdrop-blur-sm border border-gray-700/50 rounded-lg overflow-hidden">
                            <x-skeleton class="w-full h-96">
                                <img src="{{ asset('assets/home/hero-flyer.png') }}" 
                                alt="Track Record 2" 
                                class="w-full h-96 object-cover opacity-0 transition-opacity duration-500">
                            </x-skeleton>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width: 70%">
                        <div class="bg-black/40 backdrop-blur-sm border border-gray-700/50 rounded-lg overflow-hidden">
                            <x-skeleton class="w-full h-96">
                                <img src="{{ asset('assets/home/hero-flyer.png') }}" 
                                alt="Track Record 3" 
                                class="w-full h-96 object-cover opacity-0 transition-opacity duration-500">
                            </x-skeleton>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-5xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12">Documentation</h2>
            <div class="swiper swiper-documentation overflow-hidden rounded-lg">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <x-skeleton class="w-full h-auto">
                            <img src="{{ asset('assets/home/hero-flyer.png') }}" 
                            alt="Documentation 1" 
                            class="w-full h-auto object-cover opacity-0 transition-opacity duration-500">
                        </x-skeleton>
                    </div>
                    <div class="swiper-slide">
                        <x-skeleton class="w-full h-auto">
                            <img src="{{ asset('assets/home/hero-flyer.png') }}" 
                            alt="Documentation 2" 
                            class="w-full h-auto object-cover opacity-0 transition-opacity duration-500">
                        </x-skeleton>
                    </div>
                    <div class="swiper-slide">
                        <x-skeleton class="w-full h-auto">
                            <img src="{{ asset('assets/home/hero-flyer.png') }}" 
                            alt="Documentation 3" 
                            class="w-full h-auto object-cover opacity-0 transition-opacity duration-500">
                        </x-skeleton>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION OUR TEAM --}}
    <section class="py-20 px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-16">Our Team</h2>
            <div class="swiper swiper-team">
                <div class="swiper-wrapper items-center py-4">

                    {{-- CARD TIM 1 --}}
                    <div class="swiper-slide text-center">
                        <div class="relative w-64 h-80 mx-auto bg-black/40 backdrop-blur-sm border border-gray-700/50 rounded-lg flex items-center justify-center mb-4 overflow-hidden">
                            <x-skeleton class="w-full h-full">
                                <img src="{{ asset('assets/team/team-1.jpg') }}" 
                                alt="Nama Anggota 1" 
                                class="w-full h-full object-cover opacity-0 transition-opacity duration-500">
                            </x-skeleton>
                        </div>
                        <h3 class="font-semibold text-lg">Kemal</h3>
                        <p class="text-gray-400">Jabatan 1</p>
                    </div>

                    {{-- CARD TIM 2 --}}
                    <div class="swiper-slide text-center">
                        <div class="relative w-64 h-80 mx-auto bg-black/40 backdrop-blur-sm border border-gray-700/50 rounded-lg flex items-center justify-center mb-4 overflow-hidden">
                            <x-skeleton class="w-full h-full">
                                <img src="{{ asset('assets/team/team-1.jpg') }}"
                                 alt="Nama Anggota 2" 
                                 class="w-full h-full object-cover opacity-0 transition-opacity duration-500">
                            </x-skeleton>
                        </div>
                        <h3 class="font-semibold text-lg">Kemal</h3>
                        <p class="text-gray-400">Jabatan 2</p>
                    </div>

                    {{-- CARD TIM 3 --}}
                    <div class="swiper-slide text-center">
                        <div class="relative w-64 h-80 mx-auto bg-black/40 backdrop-blur-sm border border-gray-700/50 rounded-lg flex items-center justify-center mb-4 overflow-hidden">
                            <x-skeleton class="w-full h-full">
                                <img src="{{ asset('assets/team/team-1.jpg') }}" 
                                alt="Nama Anggota 3" 
                                class="w-full h-full object-cover opacity-0 transition-opacity duration-500">
                            </x-skeleton>
                        </div>
                        <h3 class="font-semibold text-lg">Kemal</h3>
                        <p class="text-gray-400">Jabatan 3</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- SECTION COLLABORATION & FOOTER --}}
    <section class="py-15 px-4">
         <div class="max-w-4xl mx-auto text-center p-10 bg-black/40 backdrop-blur-md border border-gray-700/50 rounded-2xl">
            <h2 class="text-3xl font-bold text-center mb-10">In Collaboration With</h2>
            <div class="flex flex-wrap justify-center items-center gap-x-12 gap-y-8">
                <x-skeleton class="h-14">
                    <img src="{{ asset('assets/partners/iceperience.png') }}" 
                    alt="ICEPERIENCE.ID" class="h-14 hover:scale-110 opacity-0 transition-opacity duration-500">
                </x-skeleton>
                <x-skeleton class="h-16">
                    <img src="{{ asset('assets/partners/partymap.png') }}" 
                    alt="PARTY MAP" class="h-16 hover:scale-110 opacity-0 transition-opacity duration-500">
                </x-skeleton>
                <x-skeleton class="h-36">
                    <img src="{{ asset('assets/partners/komunitas-event.png') }}" 
                    alt="KOMUNITAS EVENT" 
                    class="h-36 hover:scale-110 opacity-0 transition-opacity duration-500">
                </x-skeleton>
            </div>
         </div>
    </section>
    
    <footer class="py-20 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-10">Contact Us For More Information</h2>
            <div class="flex flex-col md:flex-row justify-center items-center gap-6">
                
                {{-- Tombol WhatsApp --}}
                <a href="https://wa.me/6282328591655" target="_blank" class="flex flex-col items-center justify-center w-48 h-32 bg-black/40 backdrop-blur-md border border-gray-700/50 rounded-2xl group hover:border-green-500 transition-colors duration-300">
                    <div class="p-4 bg-green-600 rounded-full mb-2 transition-transform group-hover:scale-110">
                        {{-- SVG WhatsApp Simple --}}
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19.05 4.91A9.82 9.82 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01m-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.26 8.26 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23m4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07s.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28"/>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-300">0823-2859-1655</span>
                </a>
                
                {{-- Tombol Email --}}
                <a href="mailto:testing@gmai.com" class="flex flex-col items-center justify-center w-48 h-32 bg-black/40 backdrop-blur-md border border-gray-700/50 rounded-2xl group hover:border-blue-500 transition-colors duration-300">
                    <div class="p-4 bg-gray-600 rounded-full mb-2 transition-transform group-hover:scale-110">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <span class="text-sm font-medium text-gray-300">testing@gmai.com</span>
                </a>

            </div>
            <div class="mt-20 border-t border-white pt-10">
                <p class="text-white">© {{ date('Y') }} Viscosity. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    {{-- SCRIPT JS --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Swiper Documentation (tidak swipe manual)
            const swiperDocumentation = new Swiper('.swiper-documentation', {
                loop: false,
                spaceBetween: 10,
                slidesPerView: 1,
                allowTouchMove: false,
            });
    
            // Swiper Activity (efek coverflow + sinkron)
            const swiperActivity = new Swiper('.swiper-activity', {
                effect: 'coverflow',
                grabCursor: true,
                centeredSlides: true,
                loop: false,
                slidesPerView: 'auto',
                coverflowEffect: {
                    rotate: 0,
                    stretch: 80,
                    depth: 200,
                    modifier: 1,
                    slideShadows: false,
                },
                controller: { control: swiperDocumentation },
            });
    
            // Sinkron dua arah
            swiperDocumentation.controller.control = swiperActivity;
    
            // Swiper Team (tidak berubah)
            const swiperTeam = new Swiper('.swiper-team', {
                loop: true,
                spaceBetween: 30,
                slidesPerView: 1.5,
                centeredSlides: true,
                grabCursor: true,
                breakpoints: {
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 }
                },
                pagination: { el: '.swiper-pagination', clickable: true },
                autoplay: { delay: 3500, disableOnInteraction: false }
            });
        });
    </script>
    @endpush
</x-app-layout>
