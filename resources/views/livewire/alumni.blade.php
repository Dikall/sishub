<div class="fixed py-28 z-0 top-0 w-full">
    <div class="flex flex-row w-full h-full p-6 gap-2">
        <div class="w-full rounded-3xl border border-slate-200 shadow-lg p-6 bg-white/20 backdrop-blur-sm">
            <h2 class="font-poppins text-slate-800 text-2xl font-bold text-center">Daftar Alumni</h2>

            <!-- Table with Data -->
            <div class="overflow-x-auto w-full">
                <table class="min-w-full mt-4 border-collapse border border-slate-200 text-sm">
                    <thead>
                        <tr class="bg-slate-200 text-slate-800">
                            <th class="border border-slate-300 p-2">NAMA</th>
                            <th class="border border-slate-300 p-2">TAHUN LULUS</th>
                            <th class="border border-slate-300 p-2">PROVINSI BEKERJA</th>
                            <th class="border border-slate-300 p-2">KABUPATEN BEKERJA/BERWIRAUSAHA</th>
                            <th class="border border-slate-300 p-2">Nama Perusahaan/Kantor Tempat/Posisi</th>
                            <th class="border border-slate-300 p-2">Studi Lanjut/Perguruan Tinggi</th>
                            <th class="border border-slate-300 p-2">Program Studi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumni as $alumnus)
                            <tr class="hover:bg-gray-50">
                                <td class="border border-slate-300 p-2">{{ $alumnus->nama }}</td>
                                <td class="border border-slate-300 p-2">{{ $alumnus->tahun }}</td>
                                <td class="border border-slate-300 p-2">{{ $alumnus->provinsi_bekerja }}</td>
                                <td class="border border-slate-300 p-2">{{ $alumnus->kabupaten_bekerja }}</td>
                                <td class="border border-slate-300 p-2">{{ $alumnus->nama_perusahaan }}</td>
                                <td class="border border-slate-300 p-2">{{ $alumnus->studi_lanjut }}</td>
                                <td class="border border-slate-300 p-2">{{ $alumnus->program_studi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $alumni->links() }}
            </div>
        </div>
    </div>
</div>