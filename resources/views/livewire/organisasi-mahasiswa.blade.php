<div class="fixed px-6 py-28 z-0 top-0">
    <div class="relative w-full h-full z-0">
        <!-- Carousel Container -->
        <div class="flex flex-col w-full h-full p-6 gap-4 overflow-hidden">
            <!-- Carousel Inner -->
            <div class="carousel-inner transition-transform duration-500 cursor-grab">
                @if ($ormawa->isNotEmpty())
                    @foreach ($ormawa as $item)
                        <!-- Carousel Item -->
                        <div class="carousel-item w-full h-max z-0 border border-slate-200 bg-white/70 backdrop-blur-md rounded-3xl p-6 flex flex-row gap-4 mb-4 select-none">
                            @if ($item->logo)
                                <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->nama }}" class="h-48 w-auto shadow rounded-2xl pointer-events-none">
                            @endif
                            <div class="flex flex-col gap-4">
                                <span class="font-poppins text-slate-800 text-xl font-bold">
                                    {{ $item->nama }}
                                </span>
                                <p class="font-poppins text-slate-800 text-sm text-justify">
                                    {{ $item->deskripsi }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No data available</p>
                @endif
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
            gap: 0.5rem;
            touch-action: pan-y pinch-zoom;
        }
        
        .carousel-item {
            margin-bottom: 0.5rem;
        }
        
        .transition-transform {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .select-none {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        </style>
</div>

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const carouselInner = document.querySelector(".carousel-inner");
    let isDragging = false;
    let startY = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;

    // Mouse & Touch Events
    carouselInner.addEventListener("mousedown", startDrag);
    carouselInner.addEventListener("mousemove", dragMove);
    carouselInner.addEventListener("mouseup", endDrag);
    carouselInner.addEventListener("mouseleave", endDrag);
    carouselInner.addEventListener("touchstart", startDrag);
    carouselInner.addEventListener("touchmove", dragMove);
    carouselInner.addEventListener("touchend", endDrag);

    // Mouse Wheel Scrolling
    carouselInner.addEventListener("wheel", (e) => {
        e.preventDefault();
        currentTranslate -= e.deltaY * 0.5;
        updatePosition();
    }, { passive: false });

    function startDrag(e) {
        isDragging = true;
        startY = getY(e);
        carouselInner.style.cursor = "grabbing";
    }

    function dragMove(e) {
        if (!isDragging) return;
        const dy = getY(e) - startY;
        currentTranslate = prevTranslate + dy;
        updatePosition();
    }

    function endDrag() {
        isDragging = false;
        prevTranslate = currentTranslate;
        carouselInner.style.cursor = "grab";
    }

    function getY(e) {
        return e.type.includes("mouse") ? e.clientY : e.touches[0].clientY;
    }

    function updatePosition() {
        carouselInner.style.transform = `translateY(${currentTranslate}px)`;
    }
});

</script>
@endpush

