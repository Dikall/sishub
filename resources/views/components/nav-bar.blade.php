{{-- resources/views/components/nav-bar.blade.php --}}
<div class="sticky bottom-0">
    <!-- Toggle Button -->
    <button id="navbar-toggle" class="w-64 py-2 rounded-2xl bg-white/20 backdrop-blur-sm text-slate-800 border border-slate-200 font-poppins text-sm flex flex-row gap-1 items-center justify-center mb-2 ml-6">
        <svg id="toggle-icon" class="w-6 h-6 text-gray-800 transform transition-transform duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 7 4 4 4-4m-8 6 4 4 4-4"/>
        </svg>
        <span>Toggle Navigation</span>
    </button>

    <!-- Navigation Content Container -->
    <div id="nav-content" class="transition-all duration-300 ease-in-out overflow-hidden w-screen">
        <div class="flex flex-row px-6 my-4 w-full h-1/2 gap-4">
            <!-- Navigation Bar -->
            <div class="flex flex-col justify-between items-center rounded-3xl bg-white/20 border backdrop-blur-sm border-slate-200 h-full w-64 px-2 py-2 gap-2">
                <a href="/beranda" class="w-full justify-center items-center">
                    <div class="cursor-pointer w-full py-2 rounded-2xl bg-slate-800 text-white font-poppins text-sm text-center">
                        Beranda
                    </div>
                </a>
                <a href="/informasi-jurusan" class="w-full justify-center items-center">
                    <div class="cursor-pointer w-full py-2 rounded-2xl bg-slate-800 text-white font-poppins text-sm text-center">
                        Informasi Jurusan
                    </div>
                </a>
                <a href="/hmsi" class="w-full justify-center items-center">
                    <div class="cursor-pointer w-full py-2 rounded-2xl bg-slate-800 text-white font-poppins text-sm text-center">
                        Organisasi Mahasiswa
                    </div>
                </a>
                <a href="/kalender-kegiatan" class="w-full justify-center items-center">
                    <div class="cursor-pointer w-full py-2 rounded-2xl bg-slate-800 text-white font-poppins text-sm text-center">
                        Kalender Kegiatan
                    </div>
                </a>
                <a href="/mata-kuliah" class="w-full justify-center items-center">
                    <div class="cursor-pointer w-full py-2 rounded-2xl bg-slate-800 text-white font-poppins text-sm text-center">
                        Mata Kuliah
                    </div>
                </a>
                <a href="/alumni-kita" class="w-full justify-center items-center">
                    <div class="cursor-pointer w-full py-2 rounded-2xl bg-slate-800 text-white font-poppins text-sm text-center">
                        Alumni
                    </div>
                </a>
            </div>

            <!-- Scrollable Content -->
            <div class="flex justify-end w-full p-4">
                <div class="flex flex-col justify-start items-center w-full bg-white/20 rounded-3xl border backdrop-blur-sm border-slate-200 p-4 gap-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 w-full">
                        @foreach ($qrCodes as $qr)
                            <div class="flex flex-col justify-between items-center rounded-3xl bg-white/20 border backdrop-blur-sm border-slate-200 h-64 w-full px-4 py-4 gap-4">
                                <h1 class="text-xl font-semibold text-slate-800 text-center">{{ $qr->judul }}</h1>
                                <div class="my-2 text-center">
                                    {!! $qr->qrCode !!}
                                </div>
                                <p class="text-slate-600 text-center">{{ $qr->detail }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbarToggle = document.getElementById('navbar-toggle');
    const navContent = document.getElementById('nav-content');
    const toggleIcon = document.getElementById('toggle-icon');
    let isNavVisible = true;

    // Store the original height
    const contentHeight = navContent.scrollHeight;
    
    function toggleNav() {
        isNavVisible = !isNavVisible;
        
        if (!isNavVisible) {
            navContent.style.maxHeight = '0px';
            navContent.style.marginTop = '0px';
            toggleIcon.classList.add('rotate-180');
        } else {
            navContent.style.maxHeight = contentHeight + 'px';
            navContent.style.marginTop = '16px'; // equivalent to my-4
            toggleIcon.classList.remove('rotate-180');
        }
    }

    // Initialize the nav content height
    navContent.style.maxHeight = contentHeight + 'px';
    
    navbarToggle.addEventListener('click', toggleNav);
});
</script>