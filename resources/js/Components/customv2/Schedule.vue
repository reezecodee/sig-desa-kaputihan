<script setup>
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import idLocale from '@fullcalendar/core/locales/id';

const calendarOptions = {
  plugins: [dayGridPlugin],
  initialView: 'dayGridMonth',
  locale: idLocale,
  dayHeaderFormat: { weekday: 'long' },
  events: '',
  headerToolbar: {
    start: '', // Judul di kiri
    center: '',      // Tengah dikosongkan
    end: ''   // Tombol 'today' di kanan (tanpa panah prev/next)
  },
  eventContent: function (info) {
    console.log(info.event.extendedProps);

    let bgColor = '';

    if (info.event.extendedProps.status === 'Kegiatan') {
      bgColor = '#007bff'; // Biru
    } else if (info.event.extendedProps.status === 'Keagamaan') {
      bgColor = '#28a745'; // Hijau
    } else if (info.event.extendedProps.status === 'Acara desa') {
      bgColor = '#ffc107'; // Kuning
    } else {
      bgColor = '#dc3545'; // Merah (Lainnya)
    }

    return {
      html: `<div title="${info.event.title}" class="overflow-hidden text-white p-1" style="background: ${bgColor}">${info.event.title}</div>`
    };
  }
}
</script>

<template>
  <div class="legend-container">
    <div class="legend-item">
      <span class="legend-color" style="background-color: #007bff;"></span>
      <span>Kegiatan</span>
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