<script setup>
import { Head } from '@inertiajs/vue3';
import LandingV2 from '@/Layouts/LandingV2.vue';
import FullCalendar from '@/Components/customv2/Schedule.vue';

defineProps({
    title: String
})
</script>

<template>

    <Head :title="title" />
    <LandingV2>
        <section class="services__v3 section" id="home">
            <div class="container">
                <div class="row mb-5 mt-5">
                    <div class="col-md-8 mx-auto text-center">
                        <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">
                            Jadwal Kegiatan
                        </span>
                        <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">
                            Jadwal Kegiatan Bulan Juli
                        </h2>
                    </div>
                </div>
                <FullCalendar/>
            </div>
        </section>
    </LandingV2>
</template>

<style scoped></style>