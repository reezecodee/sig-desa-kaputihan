<script setup>
import { Head } from '@inertiajs/vue3';
import LandingV2 from '@/Layouts/LandingV2.vue';
import Hero from '@/Pages/LandingV2/Home/section/Hero.vue';
import About from '@/Pages/LandingV2/Home/section/About.vue';
import OrganizationStructure from '@/Pages/LandingV2/Home/section/OrganizationStructure.vue';
import NatureCondition from '@/Pages/LandingV2/Home/section/NatureCondition.vue';
import CountVillage from '@/Pages/LandingV2/Home/section/CountVillage.vue';
import BuildingCategory from '@/Pages/LandingV2/Home/section/BuildingCategory.vue';
import FAQ from '@/Pages/LandingV2/Home/section/FAQ.vue';
import Report from '@/Pages/LandingV2/Home/section/Report.vue';

defineProps({
    title: String
});
</script>

<template>
    <Head :title="title" />
    <LandingV2>
        <Hero/>
        <About/>
        <OrganizationStructure/>
        <NatureCondition/>
        <CountVillage/>
        <BuildingCategory/>
        <FAQ/>
        <Report/>
    </LandingV2>
</template>