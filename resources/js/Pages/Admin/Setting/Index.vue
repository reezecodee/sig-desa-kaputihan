<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head } from '@inertiajs/vue3'
import FormSetting from '@/Components/custom/setting/FormSetting.vue'
import FormVillageProfile from '@/Components/custom/setting/FormVillageProfile.vue'

interface VillageData {
    jumlah_penduduk: number;
    jumlah_dusun: number;
    jumlah_rt: number;
    jumlah_rw: number;
    suhu_rata_rata: string;
    lokasi_elevasi: string;
    luas_wilayah: string;
    alamat_desa: string;
}

defineProps<{ 
    title: string,               
    setting: Record<string, string>,
    village: VillageData,
}>()
</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
        </template>
        <FormSetting :setting="setting" />
        <FormVillageProfile :village="village" />
    </App>
</template>

<style scoped></style>