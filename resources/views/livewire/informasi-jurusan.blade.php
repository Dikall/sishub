<div class="relative w-full h-full z-0">
    {{-- Navigation Buttons --}}
    <div class="absolute left-4 bottom-0 flex flex-row gap-4 transform -translate-y-1/2 z-50">
        <button 
            wire:click="toggleSection('informasi')"
            class="bg-white/70 hover:bg-white/50 text-black hover:text-slate-500 px-4 py-2 rounded-3xl z-20 backdrop-blur-md border border-slate-200 transition-colors
            {{ $showInformasiJurusan ? 'bg-white/50 text-slate-500' : '' }}"
        >
            Informasi Jurusan          
        </button>
        <button 
            wire:click="toggleSection('staff')"
            class="bg-white/70 hover:bg-white/50 text-black hover:text-slate-500 px-4 py-2 rounded-3xl z-20 backdrop-blur-md border border-slate-200 transition-colors
            {{ !$showInformasiJurusan ? 'bg-white/50 text-slate-500' : '' }}"
        >
            Profil Dosen dan Tenaga Akademik        
        </button>
        <div class="{{ !$showInformasiJurusan ? '' : 'hidden' }}">
            <button class="carousel-up-btn w-12 h-12 bg-slate-200 hover:bg-slate-300 text-slate-800 px-3 py-1 rounded-full">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 17-4-4-4 4m8-6-4-4-4 4"/>
                </svg>                  
            </button>
            <button class="carousel-down-btn w-12 h-12 bg-slate-200 hover:bg-slate-300 text-slate-800 px-3 py-1 rounded-full">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 7 4 4 4-4m-8 6 4 4 4-4"/>
                </svg>                  
            </button>
        </div>
    </div>

    <div class="fixed px-6 py-28 z-0 top-0">
        {{-- Informasi Jurusan Section --}}
        <div class="{{ $showInformasiJurusan ? '' : 'hidden' }}">
            @if ($jurusan)
                <div class="w-full h-max z-0 border border-slate-200 bg-white/70 backdrop-blur-md rounded-3xl p-6 flex flex-row gap-4">
                    @if ($jurusan->foto)
                        <img src="{{ asset('storage/' . $jurusan->foto) }}" alt="{{ $jurusan->nama_jurusan }}" class="h-48 w-auto shadow rounded-2xl">
                    @endif
                    <div class="flex flex-col gap-4">
                        <span class="font-poppins text-slate-800 text-xl font-bold">
                            {{ $jurusan->nama_jurusan }}
                        </span>
                        <p class="font-poppins text-slate-800 text-sm text-justify">
                            {{ $jurusan->deskripsi }}
                        </p>
                    </div>
                </div>
                <div class="flex flex-row gap-4 mt-4">
                    <div class="w-full h-64 z-0 border border-slate-200 bg-white/70 backdrop-blur-md rounded-3xl p-6 flex flex-row gap-4">
                        <span class="font-poppins text-slate-800 text-xl font-bold">
                            Visi
                        </span>
                        <p class="font-poppins text-slate-800 text-sm text-justify">
                            {!! $jurusan->visi !!}
                        </p>
                    </div>
                    <div class="w-full h-64 z-0 border border-slate-200 bg-white/70 backdrop-blur-md rounded-3xl p-6 flex flex-row gap-4">
                        <span class="font-poppins text-slate-800 text-xl font-bold">
                            Misi
                        </span>
                        <p class="font-poppins text-slate-800 text-sm text-justify">
                            {!! $jurusan->misi !!}
                        </p>
                    </div>
                </div>
            @else
                <p>No data available.</p>
            @endif
        </div>

        {{-- Staff Section with Vertical Carousel --}}
        <div class="{{ !$showInformasiJurusan ? '' : 'hidden' }}">
            <div class="vertical-carousel relative h-[calc(100vh-200px)] max-h-[800px] overflow-hidden flex flex-col items-center">
                <div class="carousel-inner flex flex-col items-center transition-transform duration-500">
                    {{-- Dosen Section --}}
                    <div class="carousel-item w-screen flex-shrink-0 flex flex-col px-6 mx-auto">
                        <div class="w-full p-6 bg-white/70 backdrop-blur-md rounded-3xl border border-slate-200 mb-4">
                            <h2 class="font-poppins text-slate-800 text-2xl font-bold mb-2 text-center">
                                Dosen Sistem Informasi
                            </h2>
                            <div class="flex flex-row gap-4">
                                @if ($dosen->isNotEmpty())
                                    @foreach ($dosen as $lecturer)
                                        <div class="w-full bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition duration-300">
                                            <div class="relative h-48 bg-gradient-to-br from-blue-500 to-indigo-600">
                                                @if ($lecturer->foto)
                                                    <img src="{{ asset('storage/' . $lecturer->foto) }}" 
                                                        alt="{{ $lecturer->nama }}" 
                                                        class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center">
                                                        <svg class="w-20 h-20 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="p-3">
                                                <span class="text-sm font-semibold text-slate-800 mb-2">
                                                    {{ $lecturer->nama }}
                                                </span>
                                                <div class="text-slate-600 text-xs">
                                                    {{ $lecturer->jabatan }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-span-full text-center py-12">
                                        <p class="text-slate-600">No lecturer data available.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Tenaga Akademik Section --}}
                    <div class="carousel-item w-screen flex-shrink-0 flex flex-col px-6 mx-auto">
                        <div class="w-full p-6 bg-white/70 backdrop-blur-md rounded-3xl border border-slate-200">
                            <h2 class="font-poppins text-slate-800 text-2xl font-bold mb-2 text-center">
                                Tenaga Akademik Sistem Informasi
                            </h2>
                            <div class="flex flex-row gap-4 justify-center">
                                @if ($tendik->isNotEmpty())
                                    @foreach ($tendik as $staff)
                                        <div class="w-60 bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition duration-300">
                                            <div class="relative h-48 bg-gradient-to-br from-blue-500 to-indigo-600">
                                                @if ($staff->foto)
                                                    <img src="{{ asset('storage/' . $staff->foto) }}" 
                                                        alt="{{ $staff->nama }}" 
                                                        class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center">
                                                        <svg class="w-20 h-20 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="p-3">
                                                <span class="text-sm font-semibold text-slate-800 mb-2">
                                                    {{ $staff->nama }}
                                                </span>
                                                <div class="text-slate-600 text-xs">
                                                    {{ $staff->jabatan }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-span-full text-center py-12">
                                        <p class="text-slate-600">No academic staff data available.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Carousel Controls --}}

            </div>
        </div>
    </div>
    <style>
        .vertical-carousel {
            overflow: hidden;
        }
        
        .carousel-inner {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        .carousel-item {
            flex-shrink: 0;
            width: 100%;
            min-height: 500px;
        }
    </style>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    let currentIndex = 0;
    let carouselInner, items, itemHeight;

    const initCarousel = () => {
        carouselInner = document.querySelector('.carousel-inner');
        items = document.querySelectorAll('.carousel-item');
        if (!items.length) return;

        itemHeight = items[0].offsetHeight;
        currentIndex = 0;
        updateCarousel(false);

        // Attach/re-attach control buttons
        const upBtn = document.querySelector('.carousel-up-btn');
        const downBtn = document.querySelector('.carousel-down-btn');
        
        if (upBtn) {
            upBtn.onclick = () => navigateCarousel(-1);
        }
        if (downBtn) {
            downBtn.onclick = () => navigateCarousel(1);
        }

        // Touch handling
        carouselInner.ontouchstart = (e) => touchStart(e);
        carouselInner.ontouchend = (e) => touchEnd(e);
    };

    const navigateCarousel = (direction) => {
        currentIndex = Math.max(0, Math.min(currentIndex + direction, items.length - 1));
        updateCarousel();
    };

    const updateCarousel = (animate = true) => {
        const translateY = -currentIndex * itemHeight;
        carouselInner.style.transition = animate ? 'transform 0.2s' : 'none';
        carouselInner.style.transform = `translateY(${translateY}px)`;
    };

    let touchStartY = 0;
    const touchStart = (e) => {
        touchStartY = e.touches[0].clientY;
    };

    const touchEnd = (e) => {
        const touchEndY = e.changedTouches[0].clientY;
        const delta = touchStartY - touchEndY;
        if (Math.abs(delta) > 50) {
            navigateCarousel(delta > 0 ? 1 : -1);
        }
    };

    // Check visibility and initialize
    const checkCarousel = () => {
        const carousel = document.querySelector('.vertical-carousel');
        if (carousel && carousel.offsetParent !== null) {
            initCarousel();
        }
    };

    // Initial check
    checkCarousel();

    // Re-check after Livewire updates
    Livewire.hook('message.processed', checkCarousel);

    // Handle window resize
    window.addEventListener('resize', () => {
        if (items && items.length) {
            itemHeight = items[0].offsetHeight;
            updateCarousel(false);
        }
    });
});
</script>
