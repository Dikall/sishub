<div class="vertical-carousel relative h-[calc(100vh-200px)] max-h-[800px] overflow-hidden flex flex-col items-center" id="carousel-{{ $this->id }}">
    <!-- Carousel Inner -->
    <div class="carousel-inner flex flex-col items-center transition-transform duration-500">
        <!-- Dosen Section -->
        <div class="carousel-item w-screen flex-shrink-0 flex flex-col px-6 mx-auto">
            <!-- ... (same as your original dosen section) ... -->
        </div>

        <!-- Tenaga Akademik Section -->
        <div class="carousel-item w-screen flex-shrink-0 flex flex-col px-6 mx-auto">
            <!-- ... (same as your original tendik section) ... -->
        </div>
    </div>

    <!-- Controls -->
    <div class="flex gap-2 mt-4">
        <button class="prev-btn w-12 h-12 bg-slate-200 hover:bg-slate-300 text-slate-800 px-3 py-1 rounded-full">↑</button>
        <button class="next-btn w-12 h-12 bg-slate-200 hover:bg-slate-300 text-slate-800 px-3 py-1 rounded-full">↓</button>
    </div>
</div>

<script>
// Scoped carousel initialization
(function() {
    const carousel = document.getElementById('carousel-{{ $this->id }}');
    const carouselInner = carousel.querySelector('.carousel-inner');
    const items = carousel.querySelectorAll('.carousel-item');
    const prevBtn = carousel.querySelector('.prev-btn');
    const nextBtn = carousel.querySelector('.next-btn');
    
    let currentIndex = 0;
    const itemHeight = items[0].offsetHeight;

    function updateCarousel() {
        carouselInner.style.transform = `translateY(-${currentIndex * itemHeight}px)`;
    }

    prevBtn.addEventListener('click', () => {
        currentIndex = Math.max(0, currentIndex - 1);
        updateCarousel();
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = Math.min(items.length - 1, currentIndex + 1);
        updateCarousel();
    });
})();
</script>