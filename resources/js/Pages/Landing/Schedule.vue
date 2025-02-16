<script setup lang="ts">
import Landing from '@/Layouts/Landing.vue';
import FullCalendar from '@/Components/custom/schedule/FullCalendar.vue';
</script>
<template>
    <Landing>
        <div class="page-title light-background">
            <div class="container">
                <h1>Jadwal Kegiatan</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Jadwal Kegiatan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section id="starter-section" class="starter-section section">
            <div class="container" data-aos="fade-up">
                <FullCalendar></FullCalendar>
            </div>
        </section>
    </Landing>
</template>

<style scoped></style>