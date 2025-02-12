<div class="carousel-item w-screen flex-shrink-0 flex flex-col px-6 mx-auto">
    <div class="w-full p-6 bg-white/70 backdrop-blur-md rounded-3xl border border-slate-200">
        <h2 class="font-poppins text-slate-800 text-2xl font-bold mb-2 text-center">
            Mata Kuliah
        </h2>

        <!-- Navigasi Tab -->
        <div class="flex justify-center gap-4 mb-6">
            <button wire:click="changeCategory('wajib')" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Wajib</button>
            <button wire:click="changeCategory('pilihan')" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Pilihan</button>
            <button wire:click="changeCategory('modambkm')" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Modambkm</button>
        </div>

        <!-- Menampilkan Daftar Mata Kuliah Berdasarkan Kategori -->
        <div class="flex flex-row gap-4 justify-center flex-wrap">
            @if ($matkuls->isNotEmpty())
                @foreach ($matkuls as $matkul)
                    <div class="w-60 bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition duration-300">
                        <div class="relative h-48 bg-gradient-to-br from-blue-500 to-indigo-600">
                            @if ($matkul->foto)
                                <img src="{{ asset('storage/' . $matkul->foto) }}" 
                                    alt="{{ $matkul->nama }}" 
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
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
                            <div class="text-slate-600 text-xs">
                                {{ ucfirst($matkul->jenis) }}
                            </div>
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
