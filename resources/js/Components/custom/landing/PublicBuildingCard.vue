<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
defineProps({
    delay: Number,
    title: String,
    description: String,
    link: String,
    icon: String
})
</script>

<template>
    <div class="col-lg-6" data-aos="fade-up" :data-aos-delay="delay">
        <div class="service-card d-flex">
            <div class="icon flex-shrink-0">
                <i :class="icon"></i>
            </div>
            <div>
                <h3>{{ title }}</h3>
                <p>{{ description }}</p>
                <Link :href="link" class="read-more">Lihat bangunan <i class="bi bi-arrow-right"></i></Link>
            </div>
        </div>
    </div>
</template>

<style scoped></style>