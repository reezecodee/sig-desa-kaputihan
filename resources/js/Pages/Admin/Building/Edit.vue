<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link } from '@inertiajs/vue3'
import Button from '@/components/ui/button/Button.vue'
import EditBuilding from '@/Components/custom/building/EditBuilding.vue'

interface Photo {
    id: string;
    nama_file: string;
}

interface Building {
    id: string;
    nama_bangunan: string;
    deskripsi: string;
    google_maps: string;
    link_lokasi: string;
    kategori_id: string;
    foto_bangunan: string;
}

defineProps<{ 
    title: string,               
    building: Building;
    buildingPhotos: Photo[];
}>()
</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
            <div class="flex items-center space-x-2">
                <Link :href="route('admin.building', building.kategori_id)">
                <Button class="shadcn-btn back-btn">Kembali</Button>
                </Link>
            </div>
        </template>
        <div class="flex justify-center">
            <EditBuilding :building="building" :building-photos="buildingPhotos" />
        </div>
    </App>
</template>

<style scoped></style>