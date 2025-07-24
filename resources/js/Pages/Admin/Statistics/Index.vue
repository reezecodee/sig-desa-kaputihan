<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, router } from '@inertiajs/vue3';
import { Card, CardHeader, CardContent, CardTitle } from '@/Components/ui/card';
import { onMounted, ref } from 'vue'
import Table from '@/Components/custom/statistics/Table.vue';
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
import FormStatistics from '@/Components/custom/statistics/FormStatistics.vue';

defineProps({
    title: String
})

const showDialog = ref(false);
const selectedId = ref(null);

const confirmDelete = (id) => {
    selectedId.value = id;
    showDialog.value = true;
};

const deleteData = () => {
    if (!selectedId.value) return;

    router.delete(route("admin.scheduleDestroy", selectedId.value))
    showDialog.value = false;
};

onMounted(() => {
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('delete-btn')) {
            const id = event.target.getAttribute('data-id')
            confirmDelete(id)
        }
    })
})
</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
            <div class="flex items-center space-x-2">
                <FormStatistics />
            </div>
        </template>
        <Card>
            <CardHeader>
                <CardTitle>
                    Daftar tahun survey
                </CardTitle>
            </CardHeader>
            <CardContent>
                <Table />
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