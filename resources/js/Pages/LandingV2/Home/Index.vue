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

const props = defineProps({
    title: String,
    landingPageData: Object
});

function pickFromObject(sourceObject, keys) {
  return keys.reduce((newObj, key) => {
    if (sourceObject && sourceObject.hasOwnProperty(key)) {
      newObj[key] = sourceObject[key];
    }
    return newObj;
  }, {});
}

const orgKeys = ['jumlah_penduduk', 'jumlah_dusun', 'jumlah_rt', 'jumlah_rw'];
const profileKeys = ['suhu_rata_rata', 'lokasi_elevasi', 'luas_wilayah', 'alamat_desa'];

const countOrg = pickFromObject(props.landingPageData.villageProfile, orgKeys);
const villageProfile = pickFromObject(props.landingPageData.villageProfile, profileKeys);
</script>

<template>
    <Head :title="title" />
    <LandingV2>
        <Hero/>
        <About/>
        <OrganizationStructure/>
        <NatureCondition :villageProfile="villageProfile"/>
        <CountVillage :count="countOrg"/>
        <BuildingCategory/>
        <FAQ/>
        <Report/>
    </LandingV2>
</template>