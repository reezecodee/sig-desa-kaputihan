<script setup lang="ts">
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'

const calendarOptions = {
  plugins: [dayGridPlugin], 
  initialView: 'dayGridMonth', 
  events: route('admin.calendar')
}
</script>

<template>
<FullCalendar :options="calendarOptions" />
</template>

<style scoped>

</style>