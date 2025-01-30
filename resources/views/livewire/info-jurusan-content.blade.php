<div class="fixed px-6 py-28 z-0 top-0">
    <div class="relative w-full h-full z-100">
        <div class="absolute left-4 bottom-0 flex flex-row gap-4 transform -translate-y-1/2 z-50">
            <button 
                wire:click="$set('showCarousel', false)"
                class="bg-white/70 hover:bg-white/50 text-black hover:text-slate-500 px-4 py-2 rounded-3xl z-20 backdrop-blur-md border border-slate-200 transition-colors"
            >
                Informasi Jurusan          
            </button>
            <button 
                wire:click="$set('showCarousel', true)"
                class="bg-white/70 hover:bg-white/50 text-black hover:text-slate-500 px-4 py-2 rounded-3xl z-20 backdrop-blur-md border border-slate-200 transition-colors"
            >
                Profil Dosen dan Tenaga Akademik        
            </button>
        </div>
    </div>

    
    <!-- Informasi Jurusan -->
    <div id="informasi-jurusan" class="{{ $showCarousel ? 'hidden' : 'block' }}">
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
        @endif
    </div>

    <!-- Lazy-loaded Carousel -->
    @if ($showCarousel)
        <livewire:dosen-tendik-carousel wire:lazy />
    @endif
</div>