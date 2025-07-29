<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, router } from '@inertiajs/vue3';
import { Card, CardContent } from '@/Components/ui/card';
import Button from '@/components/ui/button/Button.vue';
import { onMounted, ref } from 'vue'
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
                <Button class="shadcn-btn detail-btn">Buat Kategori Baru</Button>
            </div>
        </template>
        <Card>
            <CardContent>
                
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