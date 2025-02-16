<div class="relative w-full h-full z-100">
    <div class=" px-6 py-28 z-0 top-0">
    {{-- Navigation Buttons --}}
        <div class="absolute left-4 bottom-0 flex flex-row gap-4 transform -translate-y-1/2 z-50">
            <button
                wire:click="changeCategory('wajib')"
                class="bg-white/70 hover:bg-white/50 text-black hover:text-slate-500 px-4 py-2 rounded-3xl z-20 backdrop-blur-md border border-slate-200 transition-colors
                {{ $jenis === 'wajib' ? 'bg-blue-500 text-white' : '' }}"
            >
                WAJIB          
            </button>
            <button 
                wire:click="changeCategory('pilihan')"
                class="bg-white/70 hover:bg-white/50 text-black hover:text-slate-500 px-4 py-2 rounded-3xl z-20 backdrop-blur-md border border-slate-200 transition-colors
                {{ $jenis === 'pilihan' ? 'bg-blue-500 text-white' : '' }}"
            >
                PILIHAN        
            </button>
            <button 
                wire:click="changeCategory('moda_mbkm')"
                class="bg-white/70 hover:bg-white/50 text-black hover:text-slate-500 px-4 py-2 rounded-3xl z-20 backdrop-blur-md border border-slate-200 transition-colors
                {{ $jenis === 'moda_mbkm' ? 'bg-blue-500 text-white' : '' }}"
            >
                MODA MBKM        
            </button>
        </div>

        <h2 class="font-poppins text-slate-800 text-2xl font-bold mb-2 text-center">
            Mata Kuliah - {{ ucfirst($jenis) }}
        </h2>

        <!-- Menampilkan Daftar Mata Kuliah Berdasarkan Kategori -->
        <div class="flex flex-row gap-4 justify-center flex-wrap">
            @if ($matkuls->isNotEmpty())
                @foreach ($matkuls as $matkul)
                <div class="w-full bg-white shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition duration-300 flex flex-col items-center">
                    <div class="relative w-50 h-48 flex items-center justify-center bg-gradient-to-br from-blue-500 to-indigo-600">
                        @if ($matkul->foto)
                            <img src="{{ asset('storage/' . $matkul->foto) }}" 
                                alt="{{ $matkul->nama }}" 
                                class="w-full h-full object-cover object-center">
                        @else
                            <div class="w-full h-50 flex items-center justify-center">
                                <svg class="w-20 h-20 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-3 text-center">
                        <span class="text-sm font-semibold text-slate-800 mb-2 block">
                            {{ $matkul->nama }}
                        </span>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-span-full text-center py-12">
                    <p class="text-slate-600">Tidak ada mata kuliah untuk kategori ini.</p>
                </div>
            @endif
        </div>
    </div>
</div>