<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link, router } from '@inertiajs/vue3';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';
import { Button } from '@/Components/ui/button';
import Table from '@/Components/custom/schedule/Table.vue';
import { onMounted, ref } from 'vue'
import FullCalendar from '@/Components/customv2/Schedule.vue';
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
import FormSchedule from '@/Components/custom/schedule/FormSchedule.vue';

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
                <FormSchedule />
            </div>
        </template>
        <Card>
            <CardHeader>
                <CardTitle>
                    Kalender Kegiatan
                </CardTitle>
            </CardHeader>
            <CardContent>
                <FullCalendar :endpoint="route('admin.scheduleForAdminPage')" start="prev,next" end="title" />
            </CardContent>
        </Card>
        <Card>
            <CardHeader>
                <CardTitle>
                    Daftar Jadwal yang Sudah Dibuat
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