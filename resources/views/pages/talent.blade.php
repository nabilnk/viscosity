<x-app-layout>
    <div class="pt-32 pb-20 bg-black/60 backdrop-blur-sm min-h-screen">
        <div class="container mx-auto px-4">

            <h1 class="text-5xl font-bold text-center tracking-wider uppercase mb-16">TALENT</h1>

            {{-- SLIDER SELECTOR --}}
            <div class="swiper swiper-talent-selector overflow-visible mb-20">
                <div class="swiper-wrapper items-center">
                    {{-- Card Talent A --}}
                    <div class="swiper-slide">
                        <div class="relative rounded-2xl overflow-hidden group cursor-pointer transition-transform duration-300">
                            <img src="{{ asset('assets/talent/talent-a.jpg') }}" alt="Talent A" class="w-full h-96 object-cover">
                            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-all"></div>
                            <div class="absolute bottom-4 left-4 right-4 bg-white/80 backdrop-blur-sm text-black text-center font-bold p-3 rounded-xl group-hover:scale-105 transition-transform">
                                PRAD A
                            </div>
                        </div>
                    </div>
                    {{-- Card Talent B --}}
                    <div class="swiper-slide">
                        <div class="relative rounded-2xl overflow-hidden group cursor-pointer transition-transform duration-300">
                            <img src="{{ asset('assets/talent/talent-b.jpg') }}" alt="Talent B" class="w-full h-96 object-cover">
                            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-all"></div>
                            <div class="absolute bottom-4 left-4 right-4 bg-white/80 backdrop-blur-sm text-black text-center font-bold p-3 rounded-xl group-hover:scale-105 transition-transform">
                                PRAD B
                            </div>
                        </div>
                    </div>
                    {{-- Card Talent C --}}
                    <div class="swiper-slide">
                        <div class="relative rounded-2xl overflow-hidden group cursor-pointer transition-transform duration-300">
                            <img src="{{ asset('assets/talent/talent-c.jpg') }}" alt="Talent C" class="w-full h-96 object-cover">
                            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-all"></div>
                            <div class="absolute bottom-4 left-4 right-4 bg-white/80 backdrop-blur-sm text-black text-center font-bold p-3 rounded-xl group-hover:scale-105 transition-transform">
                                PRAD C
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DETAIL TALENT --}}
            <div class="swiper swiper-talent-details overflow-hidden">
                <div class="swiper-wrapper">

                    {{-- Detail Talent A --}}
                    <div class="swiper-slide">
                        <div class="flex flex-col md:flex-row gap-8 items-center justify-center max-w-5xl mx-auto px-4">
                            <div class="md:w-1/4 w-40 flex-shrink-0">
                                <img src="{{ asset('assets/talent/talent-a.jpg') }}" alt="Documentation A" class="rounded-2xl w-full shadow-lg">
                            </div>
                            <div class="md:w-3/4 w-full max-w-xl bg-black/40 backdrop-blur-md border border-gray-700/50 rounded-2xl p-6">
                                <h3 class="text-3xl font-bold mb-4">PRAD A</h3>
                                <p class="text-gray-300">Deskripsi singkat PRAD A</p>
                            </div>
                        </div>
                    </div>

                    {{-- Detail Talent B --}}
                    <div class="swiper-slide">
                        <div class="flex flex-col md:flex-row gap-8 items-center justify-center max-w-5xl mx-auto px-4">
                            <div class="md:w-1/4 w-40 flex-shrink-0">
                                <img src="{{ asset('assets/talent/talent-a.jpg') }}" alt="Documentation A" class="rounded-2xl w-full shadow-lg">
                            </div>
                            <div class="md:w-3/4 w-full max-w-xl bg-black/40 backdrop-blur-md border border-gray-700/50 rounded-2xl p-6">
                                <h3 class="text-3xl font-bold mb-4">PRAD B</h3>
                                <p class="text-gray-300">Deskripsi singkat PRAD B</p>
                            </div>
                        </div>
                    </div>

                    {{-- Detail Talent C --}}
                    <div class="swiper-slide">
                        <div class="flex flex-col md:flex-row gap-8 items-center justify-center max-w-5xl mx-auto px-4">
                            <div class="md:w-1/4 w-40 flex-shrink-0">
                                <img src="{{ asset('assets/talent/talent-c.jpg') }}" alt="Documentation A" class="rounded-2xl w-full shadow-lg">
                            </div>
                            <div class="md:w-3/4 w-full max-w-xl bg-black/40 backdrop-blur-md border border-gray-700/50 rounded-2xl p-6">
                                <h3 class="text-3xl font-bold mb-4">PRAD C</h3>
                                <p class="text-gray-300">Deskripsi singkat PRAD C</p>
                            </div>
                        </div>
                    </div>

                    {{-- Ulangi struktur yang sama untuk Talent B & C --}}
                </div>
            </div>


        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiperTalentDetails = new Swiper('.swiper-talent-details', {
            loop: false, slidesPerView: 1, allowTouchMove: false, effect: 'fade',
        });
        const swiperTalentSelector = new Swiper('.swiper-talent-selector', {
            loop: false, spaceBetween: 30, slidesPerView: 1.5, centeredSlides: true, grabCursor: true,
            breakpoints: { 768: { slidesPerView: 2.5 }, 1024: { slidesPerView: 3 } },
            on: {
                slideChangeTransitionStart: function () {
                    this.slides.forEach(slide => {
                        const innerDiv = slide.querySelector('div');
                        innerDiv.style.transform = 'scale(0.8)';
                        innerDiv.style.opacity = '0.6';
                    });
                },
                slideChangeTransitionEnd: function () {
                    const activeSlide = this.slides[this.activeIndex];
                    const innerDiv = activeSlide.querySelector('div');
                    innerDiv.style.transform = 'scale(1)';
                    innerDiv.style.opacity = '1';
                },
                init: function () {
                    this.slides.forEach((slide, index) => {
                        const innerDiv = slide.querySelector('div');
                        if (index === this.activeIndex) {
                            innerDiv.style.transform = 'scale(1)';
                            innerDiv.style.opacity = '1';
                        } else {
                            innerDiv.style.transform = 'scale(0.8)';
                            innerDiv.style.opacity = '0.6';
                        }
                    });
                }
            },
            controller: { control: swiperTalentDetails },
        });
        swiperTalentDetails.controller.control = swiperTalentSelector;
    });
    </script>
    @endpush
</x-app-layout>
