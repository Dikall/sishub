<div class="relative w-full h-full z-0">
    <div class="flex flex-row w-full h-full p-6 gap-2">
            <div class="w-full rounded-3xl border border-slate-200 shadow-lg p-6 bg-white/20 backdrop-blur-sm">
                <h2 class="font-poppins text-slate-800 text-2xl font-bold text-center">Daftar Alumni</h2>

                <!-- Pencarian Nama dan Pagination -->
                <div class="mt-4 mb-2 flex items-center justify-between flex-wrap">
                    <!-- Form Pencarian -->
                    <div class="flex items-center gap-4">
                        <label for="searchByName" class="block text-slate-700 font-medium">Cari Nama:</label>
                        <input 
                            type="text" 
                            id="searchByName" 
                            class="border border-slate-300 rounded-lg p-2 focus:ring focus:ring-blue-300 focus:outline-none w-64" 
                            placeholder="Ketik nama alumni..."
                            oninput="searchAlumni()">
                    </div>

                    <!-- Tombol Pagination -->
                    <div class="flex items-center gap-4 mt-2 md:mt-0">
                        <button 
                            id="prevButton" 
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg disabled:bg-gray-300" 
                            onclick="changePage(-1)" 
                            disabled>
                            Previous
                        </button>
                        <span id="pageNumber" class="text-slate-700"></span>
                        <button 
                            id="nextButton" 
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg disabled:bg-gray-300" 
                            onclick="changePage(1)">
                            Next
                        </button>
                    </div>
                </div>

                <!-- Tabel Data dengan Scroll Horizontal -->
                <div class="overflow-x-auto">
                    <table id="customAlumniTable" class="min-w-full mt-4 border-collapse border border-slate-200 text-sm">
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
                        <tbody id="alumniTableBody">
                            @foreach($alumni as $alumnus)
                                <tr class="alumni-row">
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
            </div>
    </div>
</div>

@push('scripts')
<script>
let alumniData = @json($alumni);  // Mengambil data alumni dari server
let currentPage = 1;
const itemsPerPage = 7;

function searchAlumni() {
    const query = document.getElementById('searchByName').value.toLowerCase();
    
    // Jika query kosong, tampilkan data asli dengan pagination
    if (query === "") {
        updateTable(alumniData.slice((currentPage - 1) * itemsPerPage, currentPage * itemsPerPage));
        return;
    }

    const filteredAlumni = alumniData.filter(alumnus => alumnus.nama.toLowerCase().includes(query));
    updateTable(filteredAlumni.slice((currentPage - 1) * itemsPerPage, currentPage * itemsPerPage));

    // Disable/Enable pagination buttons based on the search result
    document.getElementById('prevButton').disabled = currentPage === 1;
    document.getElementById('nextButton').disabled = currentPage * itemsPerPage >= filteredAlumni.length;

    document.getElementById('pageNumber').textContent = `Halaman: ${currentPage}`;
}

function changePage(direction) {
    currentPage += direction;
    const query = document.getElementById('searchByName').value.toLowerCase();

    let filteredAlumni = alumniData;
    if (query !== "") {
        filteredAlumni = alumniData.filter(alumnus => alumnus.nama.toLowerCase().includes(query));
    }

    updateTable(filteredAlumni.slice((currentPage - 1) * itemsPerPage, currentPage * itemsPerPage));

    // Toggle button visibility
    document.getElementById('prevButton').disabled = currentPage === 1;
    document.getElementById('nextButton').disabled = currentPage * itemsPerPage >= filteredAlumni.length;

    // Update page number
    document.getElementById('pageNumber').textContent = `Halaman: ${currentPage}`;
}

function updateTable(alumniList) {
    const tableBody = document.getElementById('alumniTableBody');
    tableBody.innerHTML = '';
    
    alumniList.forEach(alumnus => {
        const row = document.createElement('tr');
        row.classList.add('alumni-row');
        
        row.innerHTML = `
            <td class="border border-slate-300 p-2">${alumnus.nama || ''}</td>
            <td class="border border-slate-300 p-2">${alumnus.tahun || ''}</td>
            <td class="border border-slate-300 p-2">${alumnus.provinsi_bekerja || ''}</td>
            <td class="border border-slate-300 p-2">${alumnus.kabupaten_bekerja || ''}</td>
            <td class="border border-slate-300 p-2">${alumnus.nama_perusahaan || ''}</td>
            <td class="border border-slate-300 p-2">${alumnus.studi_lanjut || ''}</td>
            <td class="border border-slate-300 p-2">${alumnus.program_studi || ''}</td>
        `;

        tableBody.appendChild(row);
    });
}

// Initialize table with the first page of data
changePage(0);

</script>
@endpush