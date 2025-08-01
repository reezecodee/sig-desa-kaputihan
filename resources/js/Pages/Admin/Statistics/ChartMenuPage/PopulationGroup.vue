<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link, router } from '@inertiajs/vue3'
import { Card, CardHeader, CardContent, CardTitle } from '@/Components/ui/card';
import TablePopulationGroups from '@/Components/custom/statistics/TablePopulationGroups.vue';
import Button from '@/components/ui/button/Button.vue';
import { ref, onMounted, onUnmounted } from 'vue';
import {
    AlertDialog,
    AlertDialogContent,
    AlertDialogHeader,
    AlertDialogTitle,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogCancel,
    AlertDialogAction
} from "@/Components/ui/alert-dialog";
import WorldPopulationChart from '@/Pages/LandingV2/StatisticVillage/charts/WorldPopulationChart.vue';
import FormPopulationGroup from '@/Components/custom/statistics/FormPopulationGroup.vue';

defineProps({
    title: String,
    surveyID: String,
    chartData: Object,
})

const showDialog = ref<boolean>(false);
const selectedId = ref<string | null>(null);

const confirmDelete = (id: string | null): void => {
    if (id) {
        selectedId.value = id;
        showDialog.value = true;
    }
};

const deleteData = (): void => {
    if (!selectedId.value) return;
    router.delete(route("admin.popuGroupDestroy", selectedId.value), {
        onFinish: () => {
            showDialog.value = false;
            selectedId.value = null;
        },
    });
};

const handleClick = (event: MouseEvent): void => {
    if (event.target instanceof Element) {
        const deleteButton = event.target.closest('.delete-btn');
        if (deleteButton) {
            const id = deleteButton.getAttribute('data-id');
            confirmDelete(id);
        }
    }
};

onMounted(() => {
    document.addEventListener('click', handleClick);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClick);
});
</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
            <Link :href="route('admin.chartMenu', surveyID)">
            <Button class="shadcn-btn back-btn">
                Kembali
            </Button>
            </Link>
        </template>

        <Card v-if="chartData && chartData.rentang_umur && chartData.rentang_umur.length > 0">
            <CardHeader>
                <CardTitle>
                    Grafik Statistik Kelompok Penduduk Berdasarkan Umur
                </CardTitle>
            </CardHeader>
            <CardContent>
                <WorldPopulationChart title="Kelompok Penduduk Berdasarkan Umur" :data="chartData" />
            </CardContent>
        </Card>

        <Card>
            <CardHeader>
                <CardTitle>
                    Daftar data fasilitas.
                </CardTitle>
            </CardHeader>
            <CardContent>
                <div class="flex justify-end mb-5">
                    <FormPopulationGroup :surveyID="surveyID" />
                </div>
                <TablePopulationGroups :surveyID="surveyID" />
            </CardContent>
        </Card>

        <AlertDialog v-model:open="showDialog">
            <AlertDialogContent>
                <AlertDialogHeader>
                    <AlertDialogTitle>Konfirmasi Penghapusan</AlertDialogTitle>
                    <AlertDialogDescription>
                        Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.
                    </AlertDialogDescription>
                </AlertDialogHeader>
                <AlertDialogFooter>
                    <AlertDialogCancel @click="showDialog = false">Batal</AlertDialogCancel>
                    <AlertDialogAction @click="deleteData">Hapus</AlertDialogAction>
                </AlertDialogFooter>
            </AlertDialogContent>
        </AlertDialog>
    </App>
</template>

<style scoped></style>