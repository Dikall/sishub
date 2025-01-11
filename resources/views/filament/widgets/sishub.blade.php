<x-filament-widgets::widget>
    <x-filament::section>
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h1 class="text-2xl font-bold mb-4">Daftar Jurusan</h1>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-200">Nama Jurusan</th>
                        <th class="py-2 px-4 border-b border-gray-200">Deskripsi</th>
                        <th class="py-2 px-4 border-b border-gray-200">Visi</th>
                        <th class="py-2 px-4 border-b border-gray-200">Misi</th>
                        <th class="py-2 px-4 border-b border-gray-200">Tujuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jurusans as $jurusan)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $jurusan->nama_jurusan }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $jurusan->deskripsi }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $jurusan->visi }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $jurusan->misi }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $jurusan->tujuan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
