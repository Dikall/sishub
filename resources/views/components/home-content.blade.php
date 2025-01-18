{{-- views/components/carousel.blade.php --}}
<div class="relative w-full h-full z-0">
    <div class="absolute inset-0 flex items-center justify-center overflow-hidden h-full">
        <div class="relative w-full h-full flex items-center justify-center">
            @foreach($photos as $index => $photo)
            <div 
                class="absolute w-auto h-full transition-all duration-500 ease-in-out p-8"
                style="
                    transform: translateX(calc({{ $index - $activeIndex }} * 90%)) scale({{ $index === $activeIndex ? 1 : 0.8 }});
                    opacity: {{ $index === $activeIndex ? '1' : '0.5' }};
                    z-index: {{ $index === $activeIndex ? '10' : '5' }};
                "
            >
                <img 
                    src="{{ asset('storage/' . $photo->file) }}" 
                    class="w-full h-full object-cover rounded-lg shadow-lg"
                    alt="{{ $photo->judul }}"
                >
            </div>
            @endforeach
        </div>
    </div>
    
    <button 
        id="prev" 
        class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-lg z-20 transition-colors"
    >
        Previous
    </button>
    <button 
        id="next" 
        class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-lg z-20 transition-colors"
    >
        Next
    </button>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let activeIndex = {{ $activeIndex ?? 0 }};
        const totalImages = {{ count($photos) }};
        const images = document.querySelectorAll('.relative.w-full.h-full.flex > div');
        
        function updateCarousel() {
            images.forEach((image, index) => {
                const offset = index - activeIndex;
                const scale = index === activeIndex ? 1 : 0.8; // Scale for inactive images
                image.style.transform = `translateX(calc(${offset} * 90%)) scale(${scale})`;
                image.style.opacity = index === activeIndex ? '1' : '0.5';
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

        document.getElementById('next').addEventListener('click', next);
        document.getElementById('prev').addEventListener('click', prev);

        // Initialize carousel
        updateCarousel();

        // Optional: Add keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') next();
            if (e.key === 'ArrowLeft') prev();
        });
    });
</script>
@endpush