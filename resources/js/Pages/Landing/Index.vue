<script setup lang="ts">
import Landing from '@/Layouts/Landing.vue'
import Home from '@/Pages/Landing/section/Home.vue'
import About from '@/Pages/Landing/section/About.vue'
import Region from '@/Pages/Landing/section/Region.vue'
import RegionCard from '@/Pages/Landing/section/RegionCard.vue'
import CTA from '@/Pages/Landing/section/CTA.vue'
import Stats from '@/Pages/Landing/section/Stats.vue'
import PublicBuilding from '@/Pages/Landing/section/PublicBuilding.vue'
import FAQ from '@/Pages/Landing/section/FAQ.vue'
import { Head } from '@inertiajs/vue3'
import { provide, toRefs } from 'vue';

const props = defineProps({
    title: String,
    village: Object as () => Record<string, string>,
    buildings: Array as () => string[]
});

provide('props', toRefs(props));
provide('buildings', toRefs(props));
</script>

<template>

    <Head :title="title" />
    <Landing :village="village">
        <Home />
        <About />
        <Region />
        <RegionCard />
        <CTA />
        <PublicBuilding />
        <Stats />
        <FAQ />
    </Landing>
</template>

<style scoped></style>