<div class="fixed px-6 py-28 z-0 top-0">
    <div class="relative w-full h-full z-0">
        <!-- Carousel Container -->
        <div class="flex flex-col w-full h-full p-6 gap-4 overflow-hidden">
            <!-- Carousel Inner -->
            <div class="carousel-inner transition-transform duration-500">
                @if ($ormawa->isNotEmpty())
                    @foreach ($ormawa as $item)
                        <!-- Carousel Item -->
                        <div class="carousel-item w-full h-max z-0 border border-slate-200 bg-white/70 backdrop-blur-md rounded-3xl p-6 flex flex-row gap-4 mb-4">
                            @if ($item->logo)
                                <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->nama }}" class="h-48 w-auto shadow rounded-2xl">
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
</div>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const carouselInner = document.querySelector(".carousel-inner");
        const items = document.querySelectorAll(".carousel-item");
        const itemHeight = items[0]?.getBoundingClientRect().height || 0; // Tinggi setiap item
        let isDragging = false;
        let startY = 0;
        let initialTranslateY = 0;

        // Fungsi untuk mendapatkan translateY saat ini
        function getTranslateY() {
            const transform = window.getComputedStyle(carouselInner).getPropertyValue('transform');
            const matrix = new DOMMatrix(transform);
            return matrix.m42;
        }

        // Fungsi untuk mengatur translateY
        function setTranslateY(value) {
            carouselInner.style.transform = `translateY(${value}px)`;
        }

        // Fungsi untuk membatasi scrolling
        function clampScroll() {
            const currentTranslateY = getTranslateY() || 0;
            const maxTranslateY = 0;
            const minTranslateY = -(items.length - 1) * itemHeight;

            if (currentTranslateY > maxTranslateY) {
                setTranslateY(maxTranslateY);
            } else if (currentTranslateY < minTranslateY) {
                setTranslateY(minTranslateY);
            }
        }

        // Event Listener untuk gesture control
        carouselInner.addEventListener("pointerdown", (e) => {
            isDragging = true;
            startY = e.clientY;
            initialTranslateY = getTranslateY();
            carouselInner.style.transition = "none"; // Disable smooth transition
        });

        carouselInner.addEventListener("pointermove", (e) => {
            if (!isDragging) return;
            const deltaY = e.clientY - startY;
            const newTranslateY = initialTranslateY + deltaY;
            setTranslateY(newTranslateY);
        });

        carouselInner.addEventListener("pointerup", () => {
            isDragging = false;
            carouselInner.style.transition = "transform 0.5s"; // Re-enable smooth transition
            clampScroll(); // Batasi scroll agar tetap dalam range
        });

        // Event Listener untuk scroll menggunakan roda mouse
        carouselInner.addEventListener("wheel", (e) => {
            e.preventDefault(); // Mencegah scroll default
            const currentTranslateY = getTranslateY() || 0;
            const delta = e.deltaY;
            const newTranslateY = currentTranslateY - delta; // Scroll berdasarkan arah roda mouse
            const maxTranslateY = 0;
            const minTranslateY = -(items.length - 1) * itemHeight;

            // Batasi scrolling
            if (newTranslateY <= maxTranslateY && newTranslateY >= minTranslateY) {
                setTranslateY(newTranslateY);
            }
        });
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
        gap: 0,5rem;
    }

    .carousel-item {
        margin-bottom: 0,5rem;
    }
</style>
