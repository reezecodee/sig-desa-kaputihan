<script setup lang="ts">
import Landing from '@/Layouts/Landing.vue'
import Hero from '@/Pages/Landing/section/Hero.vue'
import About from '@/Pages/Landing/section/About.vue'
import Feature from '@/Pages/Landing/section/Feature.vue'
import FeatureCard from '@/Pages/Landing/section/FeatureCard.vue'
import FeatureSecond from '@/Pages/Landing/section/FeatureSecond.vue'
import CTA from '@/Pages/Landing/section/CTA.vue'
import Client from '@/Pages/Landing/section/Client.vue'
import Testimoni from '@/Pages/Landing/section/Testimoni.vue'
import Stats from '@/Pages/Landing/section/Stats.vue'
import Service from '@/Pages/Landing/section/Service.vue'
import Pricing from '@/Pages/Landing/section/Pricing.vue'
import FAQ from '@/Pages/Landing/section/FAQ.vue'
import CTASecond from '@/Pages/Landing/section/CTASecond.vue'
import Contact from '@/Pages/Landing/section/Contact.vue'
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
        <FeatureSecond />
        <CTA />
        <Client />
        <Testimoni />
        <Stats />
        <Service />
        <Pricing />
        <FAQ />
        <CTASecond />
        <Contact />
    </Landing>
</template>

<style scoped></style>