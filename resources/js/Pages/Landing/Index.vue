<script setup lang="ts">
import Landing from '@/Layouts/Landing.vue'
import Hero from '@/Pages/Landing/section/Hero.vue'
import About from '@/Pages/Landing/section/About.vue'
import Feature from '@/Pages/Landing/section/Feature.vue'
import FeatureCard from '@/Pages/Landing/section/FeatureCard.vue'
import CTA from '@/Pages/Landing/section/CTA.vue'
import Stats from '@/Pages/Landing/section/Stats.vue'
import Service from '@/Pages/Landing/section/Service.vue'
import FAQ from '@/Pages/Landing/section/FAQ.vue'
import { Head } from '@inertiajs/vue3'

defineProps({
    title: String
})
</script>

<template>

    <Head :title="title" />
    <Landing>
        <Hero />
        <About />
        <Feature />
        <FeatureCard />
        <CTA />
        <Stats />
        <Service />
        <FAQ />
    </Landing>
</template>

<style scoped></style>