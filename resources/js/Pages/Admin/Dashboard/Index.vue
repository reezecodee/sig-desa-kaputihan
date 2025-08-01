<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, router } from '@inertiajs/vue3'
import { ref, onMounted, onUnmounted } from 'vue'
import MapVillage from '@/Components/custom/landing/MapVillage.vue'
import MapTable from '@/Components/custom/dashboard/MapTable.vue'
import FormLocation from '@/Components/custom/dashboard/FormLocation.vue'
import {
    Card,
    CardContent,
    CardHeader,
    CardTitle,
} from '@/Components/ui/card'
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

defineProps({
    title: String,
    data: Object
})

const currentYear: number = new Date().getFullYear()

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
    router.delete(route("admin.locationDestroy", selectedId.value), {
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
                Dashboard
            </h2>
            <div class="flex items-center space-x-2">
                <FormLocation />
            </div>
        </template>
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            <Card>
                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <CardTitle class="text-sm font-medium">
                        Total Penduduk Desa
                    </CardTitle>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-4 w-4 text-blue-500">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                    </svg>
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold">
                        {{ data.penduduk }}
                    </div>
                </CardContent>
            </Card>

            <Card>
                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <CardTitle class="text-sm font-medium">
                        Total Jadwal di Tahun {{ currentYear }}
                    </CardTitle>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-4 w-4 text-red-500">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                        <path d="M16 3v4" />
                        <path d="M8 3v4" />
                        <path d="M4 11h16" />
                        <path d="M7 14h.013" />
                        <path d="M10.01 14h.005" />
                    </svg>
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold">
                        {{ data.jadwal }}
                    </div>
                </CardContent>
            </Card>

            <Card>
                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <CardTitle class="text-sm font-medium">
                        Total Survey Statistik
                    </CardTitle>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-4 w-4 text-purple-500">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M10 3.2a9 9 0 1 0 10.8 10.8a1 1 0 0 0 -1 -1h-6.8a2 2 0 0 1 -2 -2v-7a.9 .9 0 0 0 -1 -.8" />
                        <path d="M15 3.5a9 9 0 0 1 5.5 5.5h-4.5a1 1 0 0 1 -1 -1v-4.5" />
                    </svg>
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold">
                        {{ data.survey }} </div>
                </CardContent>
            </Card>

            <Card>
                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <CardTitle class="text-sm font-medium">
                        Total Kategori Bangunan
                    </CardTitle>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-4 w-4 text-teal-500">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 4h6v6h-6z" />
                        <path d="M4 14h6v6h-6z" />
                        <path d="M14 14h6v6h-6z" />
                        <path d="M14 4h6v6h-6z" />
                    </svg>
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold">
                        {{ data.kategori }} </div>
                </CardContent>
            </Card>

            <Card>
                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <CardTitle class="text-sm font-medium">
                        Total Bangunan
                    </CardTitle>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-4 w-4 text-orange-500">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 21v-13l9 -4l9 4v13" />
                        <path d="M13 13h4v8h-10v-6h6" />
                        <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3" />
                    </svg>
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold">
                        {{ data.bangunan }}
                    </div>
                </CardContent>
            </Card>

            <Card>
                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <CardTitle class="text-sm font-medium">
                        Total Admin
                    </CardTitle>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-4 w-4 text-green-500">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h2" />
                        <path d="M22 16c0 4 -2.5 6 -3.5 6s-3.5 -2 -3.5 -6c1 0 2.5 -.5 3.5 -1.5c1 1 2.5 1.5 3.5 1.5z" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    </svg>
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold">
                        {{ data.admin }}
                    </div>
                </CardContent>
            </Card>

            <Card>
                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <CardTitle class="text-sm font-medium">
                        Total Laporan Masuk
                    </CardTitle>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-4 w-4 text-pink-500">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 9h8" />
                        <path d="M8 13h6" />
                        <path
                            d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" />
                    </svg>
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold">
                        {{ data.laporan }}
                    </div>
                </CardContent>
            </Card>

            <Card>
                <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <CardTitle class="text-sm font-medium">
                        Total Titik Lokasi
                    </CardTitle>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-4 w-4 text-emerald-500">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                        <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                    </svg>
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold">
                        {{ data.lokasi }}
                    </div>
                </CardContent>
            </Card>
        </div>
        <br>
        <div class="w-full">
            <MapVillage height="500" />
        </div>
        <br>
        <MapTable />
        <br>
        <div>
            <img src="/placeholder/batas-dusun-rt-rw.jpg" alt="" srcset="">
        </div>
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