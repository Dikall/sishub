<div class="w-16 h-16">
    <a href="{{ $href }}" class="cursor-pointer">
        <div
            class="flex flex-col justify-center items-center transform transition-transform duration-150 ease-in-out active:scale-90">
            <div
                class="w-8 h-8 text-slate-800 hover:text-slate-500 duration-300 flex justify-center items-center">
                {{ $slot }}
            </div>
        </div>
    </a>
</div>