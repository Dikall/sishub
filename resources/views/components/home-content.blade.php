<div class="home-content">
    {{-- Photos Section --}}
    <section class="photos-section">
        <h2>Latest Photos</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($photos as $photo)
                <div class="photo-card">
                    <img src="{{ asset('storage/' . $photo->file) }}" alt="{{ $photo->judul }}" class="w-full h-48 object-cover">
                    <h3 class="mt-2">{{ $photo->judul }}</h3>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Videos Section --}}
    <section class="videos-section mt-8">
        <h2>Latest Videos</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($videos as $video)
                <div class="video-card">
                    <video class="w-full h-48 object-cover" controls>
                        <source src="{{ asset('storage/' . $video->file) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <h3 class="mt-2">{{ $video->judul }}</h3>
                </div>
            @endforeach
        </div>
    </section>
</div>