<script setup>
import LandingV2 from '@/Layouts/LandingV2.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    title: String
});
</script>

<template>
    <Head :title="title" />
    <LandingV2>
        <section class="hero__v6 section" id="home">
            <div class="container">
                
            </div>
        </section>
    </LandingV2>
</template>