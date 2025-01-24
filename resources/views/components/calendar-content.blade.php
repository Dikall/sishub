<div class="relative w-full h-full z-0">
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
                    <!-- Event list will be dynamically populated -->
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Calendar
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            aspectRatio: 6,
            headerToolbar: false,
            events: @json($events),
            eventClick: function (info) {
                // Display selected event in the Active Chosen Event section
                const activeEventEl = document.getElementById('active-event');
                activeEventEl.classList.remove('hidden');
                document.getElementById('event-title').textContent = `${info.event.title}`;
                document.getElementById('event-description').textContent = `Deskripsi: ${info.event.extendedProps.description || 'No description'}`;
                document.getElementById('event-date').textContent = `Tanggal: ${info.event.startStr} to ${info.event.endStr || 'Same day'}`;
            }
        });

        // Populate the Event List section with only upcoming events
        const eventListEl = document.getElementById('event-list');
        const today = new Date();
        const events = @json($events);

        // Filter out past events
        const upcomingEvents = events.filter(event => {
            const eventStartDate = new Date(event.start);
            return eventStartDate >= today; // Include events starting today or later
        });

        upcomingEvents.forEach(event => {
            const eventDiv = document.createElement('div');
            eventDiv.className = 'p-1 mb-1 flex flex-col relative overflow-y-hidden';
            eventDiv.innerHTML = `
                <h4 class="text-sm font-bold font-poppins text-slate-800">- ${event.title}</h4>
            `;
            eventDiv.onclick = function () {
                // Highlight clicked event in the list and show in Active Event section
                const activeEventEl = document.getElementById('active-event');
                activeEventEl.classList.remove('hidden');
                document.getElementById('event-title').textContent = `Title: ${event.title}`;
                document.getElementById('event-description').textContent = `Description: ${event.description || 'No description'}`;
                document.getElementById('event-date').textContent = `Date: ${event.start} to ${event.end || 'Same day'}`;
            };
            eventListEl.appendChild(eventDiv);
        });

        // Custom Calendar Controls
        const calendarControlEl = document.getElementById('calendar-control');
        const prevButton = document.createElement('button');
        prevButton.textContent = 'Sebelumnya';
        prevButton.className = 'px-4 py-2 bg-slate-200 rounded shadow';
        prevButton.onclick = function () {
            calendar.prev();
        };

        const nextButton = document.createElement('button');
        nextButton.textContent = 'Selanjutnya';
        nextButton.className = 'px-4 py-2 bg-slate-200 rounded shadow';
        nextButton.onclick = function () {
            calendar.next();
        };

        const todayButton = document.createElement('button');
        todayButton.textContent = 'Hari Ini';
        todayButton.className = 'px-4 py-2 bg-slate-200 rounded shadow';
        todayButton.onclick = function () {
            calendar.today();
        };

        const title = document.createElement('h2');
        title.textContent = calendar.view.title;
        title.className = 'text-xl font-semibold';

        // Update title dynamically
        calendar.on('datesSet', function () {
            title.textContent = calendar.view.title;
        });

        calendarControlEl.append(prevButton, title, todayButton, nextButton);

        calendar.render();
    });

</script>
@endpush
