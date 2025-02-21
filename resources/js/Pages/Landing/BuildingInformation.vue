<script setup lang="ts">
import Landing from '@/Layouts/Landing.vue'
import Building from '@/Pages/Landing/section/Building.vue'
import { Head } from '@inertiajs/vue3'
import { provide } from 'vue'

const props = defineProps({
    title: String,
    building: Object
})
provide('building', props.building)

const truncatedText = (text) => {
  return text.length > 150 ? text.slice(0, 150) + "" : text;
};
</script>
<template>

    <Head>
        <title>{{ `${building.nama_bangunan} - ${title} Desa Kaputihan` }}</title>
        <meta name="description" :content="truncatedText(building.deskripsi)" />
    </Head>
    <Landing>
        <div class="page-title light-background">
            <div class="container">
                <h1>Informasi Bangunan</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Informasi Bangunan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <Building></Building>
    </Landing>
</template>

<style scoped></style>