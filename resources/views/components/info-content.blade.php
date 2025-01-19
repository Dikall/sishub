<div class="relative w-full h-full z-100">
    <div class="absolute left-4 bottom-0 flex flex-row gap-4 transform -translate-y-1/2 z-50">
        <button 
            id="prev" 
            class="bg-white/70 hover:bg-white/50 text-black hover:text-slate-500 px-4 py-2 rounded-3xl z-20 backdrop-blur-md border border-slate-200 transition-colors"
        >
        Informasi Jurusan          
        </button>
        <button 
            id="next" 
            class="bg-white/70 hover:bg-white/50 text-black hover:text-slate-500 px-4 py-2 rounded-3xl z-20 backdrop-blur-md border border-slate-200 transition-colors"
        >
        Profil Dosen dan Tenaga Akademik        
        </button>
    </div>
</div>

<div class="fixed px-6 py-28 z-0 top-0">
    

    <!-- Informasi Jurusan -->
    <div id="informasi-jurusan" class="hidden">
    @if ($jurusan)
        <div class=" w-full h-max z-0 border border-slate-200 bg-white/70 backdrop-blur-md rounded-3xl p-6 flex flex-row gap-4">
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
            <div class=" w-full h-64 z-0 border border-slate-200 bg-white/70 backdrop-blur-md rounded-3xl p-6 flex flex-row gap-4">
                <span class="font-poppins text-slate-800 text-xl font-bold">
                    Visi
                </span>
                <p class="font-poppins text-slate-800 text-sm text-justify">
                    {!! $jurusan->visi !!}
                </p>
            </div>
            <div class=" w-full h-64 z-0 border border-slate-200 bg-white/70 backdrop-blur-md rounded-3xl p-6 flex flex-row gap-4">
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


    <!-- Vertical Carousel Wrapper -->
    <div class="vertical-carousel relative h-[calc(100vh-200px)] max-h-[800px] overflow-hidden flex flex-col items-center">
        <!-- Carousel Inner -->
        <div class="carousel-inner flex flex-col items-center transition-transform duration-500">
            <!-- Dosen Sistem Informasi Section -->
            <div class="carousel-item w-screen flex-shrink-0 flex flex-col px-6 mx-auto">
                <div class="w-full p-6 bg-white/70 backdrop-blur-md rounded-3xl border border-slate-200">
                    <h2 class="font-poppins text-slate-800 text-2xl font-bold mb-2">
                        Dosen Sistem Informasi
                    </h2>
                    <!-- Content -->
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

            <!-- Tenaga Akademik Sistem Informasi Section -->
            <div class="carousel-item w-screen flex-shrink-0 flex flex-col px-6 mx-auto">
                <div class="w-full p-6 bg-white/70 backdrop-blur-md rounded-3xl border border-slate-200">
                    <h2 class="font-poppins text-slate-800 text-2xl font-bold mb-2">
                        Tenaga Akademik Sistem Informasi
                    </h2>
                    <!-- Content -->
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
                                <p class="text-slate-600">No academic staff data available.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <div class=" flex gap-2">
            <button class="w-12 h-12 bg-slate-200 hover:bg-slate-300 text-slate-800 px-3 py-1 rounded-full">↑</button>
            <button class="w-12 h-12 bg-slate-200 hover:bg-slate-300 text-slate-800 px-3 py-1 rounded-full">↓</button>
        </div>
    </div>

</div>

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const carouselInner = document.querySelector(".carousel-inner");
    const items = document.querySelectorAll(".carousel-item");
    const upBtn = document.querySelector("button:first-of-type");
    const downBtn = document.querySelector("button:last-of-type");
    const itemHeight = items[0].getBoundingClientRect().height;
    let currentIndex = 0;
    
    // Touch and pointer control variables
    let isDragging = false;
    let startY = 0;
    let initialTranslateY = 0;
    
    // Threshold for slide detection (in pixels)
    const SLIDE_THRESHOLD = 50;
    
    // Calculate constraints
    const maxTranslateY = 0;
    const minTranslateY = -(items.length - 1) * itemHeight;
    
    function getTranslateY() {
        const transform = window.getComputedStyle(carouselInner).getPropertyValue('transform');
        const matrix = new DOMMatrix(transform);
        return matrix.m42;
    }
    
    function updateCarousel(offset = 0, animate = true) {
        let translateY = -(currentIndex * itemHeight) + offset;
        // Constrain the translation
        translateY = Math.max(minTranslateY, Math.min(translateY, maxTranslateY));
        
        carouselInner.style.transition = animate ? 'transform 0.3s ease-out' : 'none';
        carouselInner.style.transform = `translateY(${translateY}px)`;
    }
    
    function constrainIndex() {
        currentIndex = Math.max(0, Math.min(currentIndex, items.length - 1));
    }
    
    // Button Controls
    upBtn.addEventListener("click", () => {
        currentIndex--;
        constrainIndex();
        updateCarousel();
    });
    
    downBtn.addEventListener("click", () => {
        currentIndex++;
        constrainIndex();
        updateCarousel();
    });
    
    // Touch Events
    carouselInner.addEventListener('touchstart', (e) => {
        isDragging = true;
        startY = e.touches[0].clientY;
        initialTranslateY = getTranslateY();
        carouselInner.style.transition = 'none';
    });
    
    carouselInner.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        
        const currentY = e.touches[0].clientY;
        const diffY = currentY - startY;
        let newTranslateY = initialTranslateY + diffY;
        
        // Constrain the translation
        newTranslateY = Math.max(minTranslateY, Math.min(newTranslateY, maxTranslateY));
        carouselInner.style.transform = `translateY(${newTranslateY}px)`;
    });
    
    carouselInner.addEventListener('touchend', (e) => {
        if (!isDragging) return;
        isDragging = false;
        
        const touchEndY = e.changedTouches[0].clientY;
        const totalDiffY = touchEndY - startY;
        
        if (Math.abs(totalDiffY) >= SLIDE_THRESHOLD) {
            if (totalDiffY > 0) {
                currentIndex = Math.max(0, currentIndex - 1);
            } else {
                currentIndex = Math.min(items.length - 1, currentIndex + 1);
            }
        }
        
        updateCarousel(0, true);
    });
    
    // Pointer Events
    carouselInner.addEventListener('pointerdown', (e) => {
        isDragging = true;
        startY = e.clientY;
        initialTranslateY = getTranslateY();
        carouselInner.style.transition = 'none';
        carouselInner.setPointerCapture(e.pointerId);
    });
    
    carouselInner.addEventListener('pointermove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        
        const currentY = e.clientY;
        const diffY = currentY - startY;
        let newTranslateY = initialTranslateY + diffY;
        
        // Constrain the translation
        newTranslateY = Math.max(minTranslateY, Math.min(newTranslateY, maxTranslateY));
        carouselInner.style.transform = `translateY(${newTranslateY}px)`;
    });
    
    carouselInner.addEventListener('pointerup', (e) => {
        if (!isDragging) return;
        isDragging = false;
        
        const totalDiffY = e.clientY - startY;
        
        if (Math.abs(totalDiffY) >= SLIDE_THRESHOLD) {
            if (totalDiffY > 0) {
                currentIndex = Math.max(0, currentIndex - 1);
            } else {
                currentIndex = Math.min(items.length - 1, currentIndex + 1);
            }
        }
        
        updateCarousel(0, true);
        carouselInner.releasePointerCapture(e.pointerId);
    });
    
    // Handle pointer cancel and touch cancel events
    const cancelEvents = (e) => {
        if (!isDragging) return;
        isDragging = false;
        updateCarousel(0, true);
    };
    
    carouselInner.addEventListener('pointercancel', cancelEvents);
    carouselInner.addEventListener('touchcancel', cancelEvents);
    
    // Add grab cursor styles
    carouselInner.style.cursor = 'grab';
    carouselInner.addEventListener('pointerdown', () => {
        carouselInner.style.cursor = 'grabbing';
    });
    carouselInner.addEventListener('pointerup', () => {
        carouselInner.style.cursor = 'grab';
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const informasiJurusan = document.getElementById('informasi-jurusan');
    const verticalCarousel = document.querySelector('.vertical-carousel');
    const carouselInner = document.querySelector('.carousel-inner');

    // Function to toggle sections
    function toggleSections(showInformasi) {
        if (showInformasi) {
            // Show Informasi Jurusan, hide carousel
            informasiJurusan.classList.remove('hidden');
            verticalCarousel.classList.add('hidden');
            
            // Update button states
            prevButton.classList.add('bg-white/50', 'text-slate-500');
            prevButton.classList.remove('bg-white/70', 'text-black');
            nextButton.classList.remove('bg-white/50', 'text-slate-500');
            nextButton.classList.add('bg-white/70', 'text-black');
        } else {
            // Show carousel, hide Informasi Jurusan
            informasiJurusan.classList.add('hidden');
            verticalCarousel.classList.remove('hidden');
            
            // Reset carousel to first item
            currentIndex = 0;
            carouselInner.style.transform = 'translateY(0)';
            
            // Update button states
            prevButton.classList.remove('bg-white/50', 'text-slate-500');
            prevButton.classList.add('bg-white/70', 'text-black');
            nextButton.classList.add('bg-white/50', 'text-slate-500');
            nextButton.classList.remove('bg-white/70', 'text-black');
        }
    }

    // Add click event listeners to buttons
    prevButton.addEventListener('click', () => toggleSections(true));
    nextButton.addEventListener('click', () => toggleSections(false));

    // Initialize the view (optional: start with carousel visible)
    toggleSections(false);
});

</script>
@endpush

<style>
    .vertical-carousel {
        overflow: hidden;
    }

    .carousel-inner {
        display: flex;
        flex-direction: column;
    }

    .carousel-item {
        flex-shrink: 0;
        height: 100vh;
        max-height: 800px;
        display: flex;
        align-items: center;
    }
</style>