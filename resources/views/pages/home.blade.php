<x-app-layout>
    {{-- SECTION HERO --}}
    <section class="pt-24 pb-20 px-4 text-center bg-black/60 backdrop-blur-sm">
        <img src="{{ asset('assets/logo/viscosity-text.png') }}" alt="Viscosity Logo" class="mx-auto w-2/3 sm:w-1/2 md:w-2/5">
        <img src="{{ asset('assets/home/hero-flyer.png') }}" alt="Viscosity Flyer" class="mx-auto my-6 w-96 h-auto rounded-xl shadow-lg">
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
                        {{-- 
                            ==================================================================
                            PERBAIKAN KUNCI DI SINI: MENAMBAHKAN `style="width: 70%"`
                            Ini akan membatasi lebar setiap slide, sehingga slide di sampingnya
                            akan terlihat menumpuk di belakang, persis seperti di template.
                            ==================================================================
                        --}}
                        <div class="swiper-slide" style="width: 70%">
                            <div class="bg-black/40 backdrop-blur-sm border border-gray-700/50 rounded-lg overflow-hidden">
                                <img src="{{ asset('assets/home/hero-flyer.png') }}" alt="Track Record 1" class="w-full h-96 object-cover">
                                <div class="p-4"><p class="text-gray-300 text-sm">Deskripsi untuk activity 1</p></div>
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 70%">
                            <div class="bg-black/40 backdrop-blur-sm border border-gray-700/50 rounded-lg overflow-hidden">
                                <img src="{{ asset('assets/home/hero-flyer.png') }}" alt="Track Record 2" class="w-full h-96 object-cover">
                                <div class="p-4"><p class="text-gray-300 text-sm">Deskripsi untuk activity 2</p></div>
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 70%">
                            <div class="bg-black/40 backdrop-blur-sm border border-gray-700/50 rounded-lg overflow-hidden">
                                <img src="{{ asset('assets/home/hero-flyer.png') }}" alt="Track Record 3" class="w-full h-96 object-cover">
                                <div class="p-4"><p class="text-gray-300 text-sm">Deskripsi untuk activity 3</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12">Documentation</h2>
                <div class="swiper swiper-documentation overflow-hidden rounded-lg">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('assets/home/hero-flyer.png') }}" alt="Documentation 1" class="w-full h-auto object-cover"></div>
                        <div class="swiper-slide"><img src="{{ asset('assets/home/hero-flyer.png') }}" alt="Documentation 2" class="w-full h-auto object-cover"></div>
                        <div class="swiper-slide"><img src="{{ asset('assets/home/hero-flyer.png') }}" alt="Documentation 3" class="w-full h-auto object-cover"></div>
                    </div>
                </div>
            </div>
    </section>

    {{-- SECTION OUR TEAM (Tidak ada perubahan) --}}
    <section class="py-20 px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-16">Our Team</h2>
            <div class="swiper swiper-team">
                <div class="swiper-wrapper items-center py-4">

                    {{-- CARD TIM 1 --}}
                    <div class="swiper-slide text-center">
                        <div class="relative w-64 h-80 mx-auto bg-black/40 backdrop-blur-sm border border-gray-700/50 rounded-lg flex items-center justify-center mb-4 overflow-hidden">
                            {{-- GANTI DENGAN FOTO ANDA --}}
                            <img src="{{ asset('assets/team/team-1.jpg') }}" alt="Nama Anggota 1" class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-semibold text-lg">Kemal</h3>
                        <p class="text-gray-400">Jabatan 1</p>
                    </div>

                    {{-- CARD TIM 2 --}}
                    <div class="swiper-slide text-center">
                        <div class="relative w-64 h-80 mx-auto bg-black/40 backdrop-blur-sm border border-gray-700/50 rounded-lg flex items-center justify-center mb-4 overflow-hidden">
                            {{-- GANTI DENGAN FOTO ANDA --}}
                            <img src="{{ asset('assets/team/team-1.jpg') }}" alt="Nama Anggota 2" class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-semibold text-lg">Kemal</h3>
                        <p class="text-gray-400">Jabatan 2</p>
                    </div>

                    {{-- CARD TIM 3 --}}
                    <div class="swiper-slide text-center">
                        <div class="relative w-64 h-80 mx-auto bg-black/40 backdrop-blur-sm border border-gray-700/50 rounded-lg flex items-center justify-center mb-4 overflow-hidden">
                            {{-- GANTI DENGAN FOTO ANDA --}}
                             <img src="{{ asset('assets/team/team-1.jpg') }}" alt="Nama Anggota 3" class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-semibold text-lg">Kemal</h3>
                        <p class="text-gray-400">Jabatan 3</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- SECTION COLLABORATION & FOOTER (Tidak ada perubahan) --}}
    <section class="py-15 px-4">
         <div class="max-w-4xl mx-auto text-center p-10 bg-black/40 backdrop-blur-md border border-gray-700/50 rounded-2xl">
            <h2 class="text-3xl font-bold text-center mb-10">In Collaboration With</h2>
            <div class="flex flex-wrap justify-center items-center gap-x-12 gap-y-8">
                {{-- GANTI DENGAN LOGO PARTNER ANDA --}}
                <img src="{{ asset('assets/partners/iceperience.png') }}" alt="ICEPERIENCE.ID" class="h-14 transition-transform hover:scale-110">
                <img src="{{ asset('assets/partners/partymap.png') }}" alt="PARTY MAP" class="h-16 transition-transform hover:scale-110">
                <img src="{{ asset('assets/partners/komunitas-event.png') }}" alt="KOMUNITAS EVENT" class="h-36 transition-transform hover:scale-110">
                {{-- TAMBAHKAN LOGO LAINNYA DI SINI --}}
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
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M16.999 3.001c-2.454-2.454-5.71-3.682-8.999-3.001-3.288.681-6.113 3.507-6.794 6.794-.681 3.288.547 6.545 3.001 8.999l-1.206 4.209 4.39-1.256c2.316 1.439 5.111 1.696 7.609.789 2.498-.907 4.591-2.999 5.498-5.498.907-2.498.65-5.293-.789-7.609zm-2.883 11.237c-.218.218-.511.341-.82.341-.308 0-.602-.123-.82-.341l-1.018-.999c-.66-.64-1.602-.919-2.502-.738l-1.39.286c-.24.049-.488-.049-.66-.238-.171-.188-.239-.45-.18-.707l.295-1.298c.328-1.439-.079-2.969-.999-4.148-.92-.1179-1.999.308-2.618.999-.619.69-.999 1.631-.999 2.618 0 .988.38 1.928.999 2.618l.999.999c.438.438.969.748 1.538.919l1.419.429c.5.15.96.44 1.32.84z"/></svg>
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