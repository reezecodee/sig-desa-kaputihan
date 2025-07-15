<script setup>
import LandingV2 from '@/Layouts/LandingV2.vue';
import Hero from '@/Pages/LandingV2/section/Hero.vue';
import About from '@/Pages/LandingV2/section/About.vue';
import OrganizationStructure from '@/Pages/LandingV2/section/OrganizationStructure.vue';
import NatureCondition from '@/Pages/LandingV2/section/NatureCondition.vue';
import CountVillage from '@/Pages/LandingV2/section/CountVillage.vue';
import BuildingCategory from '@/Pages/LandingV2/section/BuildingCategory.vue';
import FAQ from '@/Pages/LandingV2/section/FAQ.vue';
import Report from '@/Pages/LandingV2/section/Report.vue';
</script>

<template>
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