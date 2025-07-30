<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link, router } from '@inertiajs/vue3'
import { Card, CardHeader, CardContent, CardTitle } from '@/Components/ui/card';
import TablePopulationCategories from '@/Components/custom/statistics/TablePopulationCategories.vue';
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
import StackedLineChart from '@/Pages/LandingV2/StatisticVillage/charts/StackedLineChart.vue';
import FormPopulationCategory from '@/Components/custom/statistics/FormPopulationCategory.vue';

defineProps({
    title: String,
    id: String,
    category: String,
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
    router.delete(route("admin.popuCategoryDestroy", selectedId.value), {
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
            <Link :href="route('admin.chartMenu', id)">
            <Button class="shadcn-btn delete-btn">
                Kembali
            </Button>
            </Link>
        </template>

        <Card>
            <CardHeader>
                <CardTitle>
                    Grafik Statistik Kategori Penduduk {{ category }}
                </CardTitle>
            </CardHeader>
            <CardContent>
                <StackedLineChart v-if="chartData" :title="category"
                            :data="chartData" />
            </CardContent>
        </Card>

        <Card>
            <CardHeader>
                <CardTitle>
                    Daftar Data Kategori Penduduk {{ category }}.
                </CardTitle>
            </CardHeader>
            <CardContent>
                <div class="flex justify-end mb-5">
                    <FormPopulationCategory :surveyID="id" :category="category" />
                </div>
                <TablePopulationCategories :surveyID="id" :category="category" />
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