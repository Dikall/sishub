<div class="relative w-full h-full z-0" id="carousel">
    <div 
        class="absolute inset-0 flex items-center justify-center overflow-hidden h-full touch-pan-x cursor-grab active:cursor-grabbing"
        id="carouselTrack"
    >
        <div class="relative w-full h-full flex items-center justify-center">
            @foreach($photos as $index => $photo)
            <div 
                data-index="{{ $index }}"
                class="absolute w-auto h-full transition-all duration-500 ease-in-out p-8 carousel-slide"
                style="
                    transform: translateX(calc({{ $index - $activeIndex }} * 90%)) scale({{ $index === $activeIndex ? 1 : 0.8 }});
                    z-index: {{ $index === $activeIndex ? '10' : '5' }};
                    opacity: {{ abs($index - $activeIndex) <= 1 ? '1' : '0' }};
                "
            >
                <img 
                    src="{{ asset('storage/' . $photo->file) }}" 
                    class="w-full h-full object-cover rounded-lg shadow-lg select-none"
                    alt="{{ $photo->judul }}"
                    draggable="false"
                    loading="lazy"
                >
            </div>
            @endforeach
        </div>
    </div>
    
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2 z-20" id="carouselDots">
        @foreach($photos as $index => $photo)
        <button 
            data-index="{{ $index }}"
            class="w-2 h-2 rounded-full transition-all duration-300 carousel-dot {{ $index === $activeIndex ? 'bg-white scale-125' : 'bg-white/50 hover:bg-white/75' }}"
            aria-label="Go to slide {{ $index + 1 }}"
        ></button>
        @endforeach
    </div>
    
    <div class="absolute left-4 bottom-0 flex flex-row gap-4 transform -translate-y-1/2 z-50">
        <button 
            id="prevButton"
            class="bg-white/70 hover:bg-white/50 text-black hover:text-slate-500 px-4 py-2 rounded-3xl z-20 backdrop-blur-md border border-slate-200 transition-colors"
            aria-label="Previous slide"
        >
            <svg class="w-6 h-6 text-slate-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
            </svg>          
        </button>
        <button 
            id="nextButton"
            class="bg-white/70 hover:bg-white/50 text-black hover:text-slate-500 px-4 py-2 rounded-3xl z-20 backdrop-blur-md border border-slate-200 transition-colors"
            aria-label="Next slide"
        >
            <svg class="w-6 h-6 text-slate-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
            </svg>          
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('carousel');
    const track = document.getElementById('carouselTrack');
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    
    let activeIndex = {{ $activeIndex }};
    const totalSlides = {{ $totalImages }};
    let startX = 0;
    let currentX = 0;
    let isDragging = false;
    let autoSlideInterval;
    
    function updateSlides() {
        slides.forEach((slide, index) => {
            slide.style.transform = `translateX(calc(${index - activeIndex} * 90%)) scale(${index === activeIndex ? 1 : 0.8})`;
            slide.style.zIndex = index === activeIndex ? '10' : '5';
            slide.style.opacity = Math.abs(index - activeIndex) <= 1 ? '1' : '0';
        });
        
        dots.forEach((dot, index) => {
            if (index === activeIndex) {
                dot.classList.add('bg-white', 'scale-125');
                dot.classList.remove('bg-white/50');
            } else {
                dot.classList.remove('bg-white', 'scale-125');
                dot.classList.add('bg-white/50');
            }
        });
    }
    
    function next() {
        activeIndex = (activeIndex + 1) % totalSlides;
        updateSlides();
    }
    
    function prev() {
        activeIndex = (activeIndex - 1 + totalSlides) % totalSlides;
        updateSlides();
    }
    
    function startAutoSlide() {
        autoSlideInterval = setInterval(next, 8000);
    }
    
    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }
    
    // Touch and mouse events
    function handleDragStart(e) {
        isDragging = true;
        startX = e.type.includes('mouse') ? e.clientX : e.touches[0].clientX;
        track.style.cursor = 'grabbing';
    }
    
    function handleDragMove(e) {
        if (!isDragging) return;
        e.preventDefault();
        currentX = e.type.includes('mouse') ? e.clientX : e.touches[0].clientX;
    }
    
    function handleDragEnd(e) {
        if (!isDragging) return;
        isDragging = false;
        track.style.cursor = 'grab';
        
        const endX = e.type.includes('mouse') ? e.clientX : (e.changedTouches ? e.changedTouches[0].clientX : currentX);
        const distance = endX - startX;
        
        if (Math.abs(distance) > 50) {
            if (distance > 0) {
                prev();
            } else {
                next();
            }
        }
        
        resetAutoSlide();
    }
    
    // Event listeners
    track.addEventListener('mousedown', handleDragStart);
    track.addEventListener('mousemove', handleDragMove);
    track.addEventListener('mouseup', handleDragEnd);
    track.addEventListener('mouseleave', handleDragEnd);
    
    track.addEventListener('touchstart', handleDragStart);
    track.addEventListener('touchmove', handleDragMove);
    track.addEventListener('touchend', handleDragEnd);
    
    prevButton.addEventListener('click', () => {
        prev();
        resetAutoSlide();
    });
    
    nextButton.addEventListener('click', () => {
        next();
        resetAutoSlide();
    });
    
    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            activeIndex = parseInt(dot.dataset.index);
            updateSlides();
            resetAutoSlide();
        });
    });
    
    // Start auto-sliding
    startAutoSlide();
});
</script>