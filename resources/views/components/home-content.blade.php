{{-- views/components/carousel.blade.php --}}
<div class="relative w-full h-full z-0">
    <div 
        class="absolute inset-0 flex items-center justify-center overflow-hidden h-full touch-pan-x cursor-grab active:cursor-grabbing"
        id="carouselContainer"
    >
        <div class="relative w-full h-full flex items-center justify-center">
            @foreach($photos as $index => $photo)
            <div 
                class="absolute w-auto h-full transition-all duration-500 ease-in-out p-8"
                style="
                    transform: translateX(calc({{ $index - $activeIndex }} * 90%)) scale({{ $index === $activeIndex ? 1 : 0.8 }});
                    z-index: {{ $index === $activeIndex ? '10' : '5' }};
                "
            >
                <img 
                    src="{{ asset('storage/' . $photo->file) }}" 
                    class="w-full h-full object-cover rounded-lg shadow-lg select-none"
                    alt="{{ $photo->judul }}"
                    draggable="false"
                >
            </div>
            @endforeach
        </div>
    </div>
    <div class="absolute left-4 bottom-0 flex flex-row gap-4 transform -translate-y-1/2 z-50">
        <button 
            id="prev" 
            class="bg-white/70 hover:bg-white/50 text-black hover:text-slate-500 px-4 py-2 rounded-3xl z-20 backdrop-blur-md border border-slate-200 transition-colors"
        >
            <svg class="w-6 h-6 text-slate-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
            </svg>          
        </button>
        <button 
            id="next" 
            class="bg-white/70 hover:bg-white/50 text-black hover:text-slate-500 px-4 py-2 rounded-3xl z-20 backdrop-blur-md border border-slate-200 transition-colors"
        >
            <svg class="w-6 h-6 text-slate-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
            </svg>          
        </button>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let activeIndex = {{ $activeIndex ?? 0 }};
        const totalImages = {{ count($photos) }};
        const images = document.querySelectorAll('.relative.w-full.h-full.flex > div');
        const container = document.getElementById('carouselContainer');
        
        // Interaction handling variables
        let startX = 0;
        let currentX = 0;
        let isDragging = false;
        const minSwipeDistance = 50;

        // Auto slide interval ID
        let autoSlideInterval;

        function updateCarousel() {
            images.forEach((image, index) => {
                const offset = index - activeIndex;
                const scale = index === activeIndex ? 1 : 0.8;
                image.style.transform = `translateX(calc(${offset} * 500px)) scale(${scale})`;
                image.style.zIndex = index === activeIndex ? '10' : '5';
            });
        }

        function next() {
            activeIndex = (activeIndex + 1) % totalImages;
            updateCarousel();
        }

        function prev() {
            activeIndex = (activeIndex - 1 + totalImages) % totalImages;
            updateCarousel();
        }

        // Restart the auto-slide timer
        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(next, 8000); // Change slide every 5 seconds
        }

        // Touch event handlers
        function handleTouchStart(event) {
            startX = event.touches[0].clientX;
        }

        function handleTouchMove(event) {
            event.preventDefault();
            currentX = event.touches[0].clientX;
        }

        function handleTouchEnd(event) {
            const endX = event.changedTouches[0].clientX;
            handleSwipe(endX - startX);
            resetAutoSlide();
        }

        // Pointer event handlers
        function handlePointerDown(event) {
            isDragging = true;
            startX = event.clientX;
            container.setPointerCapture(event.pointerId);
            clearInterval(autoSlideInterval); // Pause auto-slide while dragging
        }

        function handlePointerMove(event) {
            if (!isDragging) return;
            event.preventDefault();
            currentX = event.clientX;
        }

        function handlePointerUp(event) {
            if (!isDragging) return;
            isDragging = false;
            container.releasePointerCapture(event.pointerId);
            handleSwipe(event.clientX - startX);
            resetAutoSlide(); // Resume auto-slide after dragging
        }

        function handlePointerCancel(event) {
            isDragging = false;
            container.releasePointerCapture(event.pointerId);
        }

        function handleSwipe(distance) {
            if (Math.abs(distance) > minSwipeDistance) {
                if (distance > 0) {
                    prev();
                } else {
                    next();
                }
            }
        }

        // Add touch event listeners
        container.addEventListener('touchstart', handleTouchStart, { passive: false });
        container.addEventListener('touchmove', handleTouchMove, { passive: false });
        container.addEventListener('touchend', handleTouchEnd);
        container.addEventListener('touchcancel', handleTouchEnd);

        // Add pointer event listeners
        container.addEventListener('pointerdown', handlePointerDown);
        container.addEventListener('pointermove', handlePointerMove);
        container.addEventListener('pointerup', handlePointerUp);
        container.addEventListener('pointercancel', handlePointerCancel);

        // Keep existing button listeners
        document.getElementById('next').addEventListener('click', () => {
            next();
            resetAutoSlide();
        });
        document.getElementById('prev').addEventListener('click', () => {
            prev();
            resetAutoSlide();
        });

        // Initialize the carousel and auto-slide
        updateCarousel();
        startAutoSlide();
    });
</script>
@endpush
