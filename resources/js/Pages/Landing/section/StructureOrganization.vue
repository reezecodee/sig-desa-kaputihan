<script setup lang="ts">
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue';

const village = computed(() => usePage().props.village)
</script>

<template>
    <section id="organisasi" class="features section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Struktur Organisasi</h2>
        </div>

        <div class="container">
            <div class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <img :src="village.organisasi ? `/storage/${village.organisasi}` : '/placeholder/organisasi.png'"
                    alt="Struktur Organisasi Desa Kaputihan">
            </div>
        </div>
    </section>
</template>

<style scoped>
img {
    max-width: 100%;
    height: auto;
}
</style>