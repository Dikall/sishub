<div>
    <video src="/storage/video-bg.mp4" autoplay muted loop class="fixed top-0 left-0 min-w-full min-h-full z-0"></video>

    <div class="flex flex-col items-center justify-center h-screen w-screen overflow-hidden">
        <!-- Persistent Header -->
        <x-header class="fixed top-0"/>

        <div class="flex flex-col items-center justify-center w-full h-full z-10">
            <div class="w-full h-full px-4">
                {{ $slot }} <!-- This is the part that changes -->
            </div>
        </div>

        <!-- Persistent Nav Bar -->
        <x-nav-bar class="fixed bottom-0 z-90"/>
    </div>
</div>
