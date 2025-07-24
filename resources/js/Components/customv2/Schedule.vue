<script setup>
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import idLocale from '@fullcalendar/core/locales/id';

const props = defineProps({
  endpoint: {
    type: String,
    default: '/'
  },
  start: {
    type: String,
    default: ''
  },
  center: {
    type: String,
    default: ''
  },
  end: {
    type: String,
    default: ''
  }
});

const calendarOptions = {
  plugins: [dayGridPlugin],
  initialView: 'dayGridMonth',
  locale: idLocale,
  dayHeaderFormat: { weekday: 'long' },
  events: props.endpoint,
  headerToolbar: {
    start: props.start, // Judul di kiri
    center: props.center,      // Tengah dikosongkan
    end: props.end   // Tombol 'today' di kanan (tanpa panah prev/next)
  },
  eventContent: function (info) {
    console.log(info.event.extendedProps);

    let bgColor = '';
    let activityCategory = info.event.extendedProps.category;

    if (activityCategory === 'Kegiatan Sosial') {
      bgColor = '#007bff'; // Biru
    } else if (activityCategory === 'Keagamaan') {
      bgColor = '#28a745'; // Hijau
    } else if (activityCategory === 'Acara Desa') {
      bgColor = '#ffc107'; // Kuning
    } else {
      bgColor = '#dc3545'; // Merah (Lainnya)
    }

    return {
      html: `<div 
           title="Kegiatan: ${info.event.title}\nKeterangan: ${info.event.extendedProps.description}"
           class="overflow-hidden text-white p-1"
           style="background: ${bgColor}"
         >
           ${info.event.title}
         </div>`
    };
  }
}
</script>

<template>
  <div class="legend-container mb-5">
    <div class="legend-item">
      <span class="legend-color" style="background-color: #007bff;"></span>
      <span>Kegiatan Sosial</span>
    </div>
    <div class="legend-item">
      <span class="legend-color" style="background-color: #28a745;"></span>
      <span>Keagamaan</span>
    </div>
    <div class="legend-item">
      <span class="legend-color" style="background-color: #ffc107;"></span>
      <span>Acara Desa</span>
    </div>
    <div class="legend-item">
      <span class="legend-color" style="background-color: #dc3545;"></span>
      <span>Lainnya</span>
    </div>
  </div>

  <FullCalendar :options="calendarOptions" />
</template>

<style scoped>
.legend-container {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 10px;
}

.legend-item {
  display: flex;
  align-items: center;
}

.legend-color {
  display: inline-block;
  width: 16px;
  height: 16px;
  margin-right: 8px;
  border-radius: 3px;
}

:deep(a.fc-col-header-cell-cushion) {
  text-decoration: none;
  color: inherit;
}
</style>