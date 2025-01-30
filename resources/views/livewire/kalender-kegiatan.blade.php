<div class="relative w-full h-full z-0" wire:ignore>
    <div class="flex flex-row w-full h-full p-6 gap-2">
        <div class="flex flex-col gap-2 w-full h-full">
            <div class="flex flex-row w-full h-full rounded-3xl border border-slate-200 shadow-lg p-6 bg-white/20 backdrop-blur-sm">
                <div id="calendar" class="w-full relative"></div>
            </div>
            <!-- Calendar Control Section -->
            <div class="flex flex-row w-full h-30 rounded-3xl border border-slate-200 shadow-lg p-6 bg-white/20 backdrop-blur-sm">
                <div id="calendar-control" class="flex justify-between items-center w-full"></div>
            </div>
        </div>
        <div class="relative flex flex-col gap-2 w-full h-full">
            <!-- List of Events -->
            <div class="relative flex flex-col w-full h-full rounded-3xl border border-slate-200 shadow-lg p-6 bg-white/20 backdrop-blur-sm overflow-hidden">
                <h2 class="relative font-poppins text-slate-800 text-2xl font-bold mb-2 text-center">
                    Kegiatan Mendatang
                </h2>
                <div id="event-list" class="relative flex flex-col flex-1 w-full overflow-y-hidden">
                    @foreach($events as $event)
                        @if(\Carbon\Carbon::parse($event['start'])->isFuture())
                            <div class="p-1 mb-1 flex flex-col relative overflow-y-hidden cursor-pointer event-item"
                                 data-title="{{ $event['title'] }}"
                                 data-description="{{ $event['description'] ?? 'No description' }}"
                                 data-start="{{ $event['start'] }}"
                                 data-end="{{ $event['end'] ?? '' }}">
                                <h4 class="text-sm font-bold font-poppins text-slate-800">- {{ $event['title'] }}</h4>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- Active Chosen Event -->
            <div id="active-event" class="hidden flex flex-row w-full h-32 rounded-3xl border border-slate-200 shadow-lg p-6 bg-white/20 backdrop-blur-sm overflow-hidden">
                <div class="flex flex-col w-full">
                    <p id="event-title" class="text-md font-poppins text-slate-800 font-bold"></p>
                    <p id="event-description" class="mt-1 text-sm font-poppins text-slate-800"></p>
                    <p id="event-date" class="mt-1 text-sm font-poppins text-slate-800"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            aspectRatio: 6,
            headerToolbar: false,
            events: @json($events),
            eventClick: function (info) {
                updateActiveEvent(info.event);
            }
        });

        // Initialize controls
        const calendarControlEl = document.getElementById('calendar-control');
        const title = document.createElement('h2');
        title.className = 'text-xl font-semibold';
        
        // Buttons
        const prevButton = createButton('Sebelumnya', () => calendar.prev());
        const nextButton = createButton('Selanjutnya', () => calendar.next());
        const todayButton = createButton('Hari Ini', () => calendar.today());

        calendarControlEl.append(prevButton, title, todayButton, nextButton);
        
        calendar.on('datesSet', () => {
            title.textContent = calendar.view.title;
        });

        calendar.render();

        // Event list click handlers
        document.querySelectorAll('.event-item').forEach(item => {
            item.addEventListener('click', () => {
                const eventData = {
                    title: item.dataset.title,
                    description: item.dataset.description,
                    start: item.dataset.start,
                    end: item.dataset.end
                };
                updateActiveEvent(eventData);
            });
        });

        function updateActiveEvent(eventData) {
            const activeEventEl = document.getElementById('active-event');
            activeEventEl.classList.remove('hidden');
            document.getElementById('event-title').textContent = eventData.title;
            document.getElementById('event-description').textContent = `Deskripsi: ${eventData.description}`;
            const endDate = eventData.end ? new Date(eventData.end) : null;
            const dateString = endDate ? 
                `${formatDate(eventData.start)} sampai ${formatDate(eventData.end)}` :
                `${formatDate(eventData.start)}`;
            document.getElementById('event-date').textContent = `Tanggal: ${dateString}`;
        }

        function createButton(text, onClick) {
            const button = document.createElement('button');
            button.textContent = text;
            button.className = 'px-4 py-2 bg-slate-200 rounded shadow';
            button.addEventListener('click', onClick);
            return button;
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }
    });
</script>