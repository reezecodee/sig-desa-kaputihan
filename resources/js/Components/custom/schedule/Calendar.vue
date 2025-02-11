<script setup lang="ts">
var calendarEl = document.getElementById('calendar');

var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    events: route('admin.calendar'), 
    // eventContent: function (info) {
    //     let bootstrapClass = '';

    //     // Atur warna berdasarkan tipe event
    //     if (info.event.extendedProps.description === 'Libur') {
    //         bootstrapClass = 'bg-danger'; // Merah
    //     } else if (info.event.extendedProps.description === 'Kegiatan') {
    //         bootstrapClass = 'bg-success'; // Hijau
    //     } else {
    //         bootstrapClass = 'bg-warning'; // Kuning
    //     }

    //     return {
    //         html: `<div title="${info.event.title}" class="overflow-hidden text-white p-1 ${bootstrapClass}">${info.event.title}</div>`
    //     };
    // }
});

calendar.render();
</script>

<template>
 <div id="calendar" class="mb-5"></div>
</template>

<style scoped></style>