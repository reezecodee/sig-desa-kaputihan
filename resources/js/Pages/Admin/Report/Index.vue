<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, router } from '@inertiajs/vue3';
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';
import { onMounted, onUnmounted, ref } from 'vue'
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
import Table from '@/Components/custom/report/Table.vue';

defineProps({
    title: String
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
  router.delete(route("admin.categoryDestroy", selectedId.value), {
    onFinish: () => {
      showDialog.value = false;
      selectedId.value = null; 
    },
  });
};

const redirectToDetail = (id: string) => {
  router.visit(route('admin.reportDetail', id), {
    preserveState: false
  })
}

const handleButtonClick = (event: Event): void => {
  if (event.target instanceof HTMLElement) {
    const targetElement = event.target;
    const id = targetElement.getAttribute('data-id');

    if (targetElement.classList.contains('delete-btn')) {
      confirmDelete(id);
    } 
    else if (targetElement.classList.contains('detail-btn')) {
      redirectToDetail(id);
    }
  }
}

onMounted(() => {
  document.addEventListener('click', handleButtonClick);
});

onUnmounted(() => {
  document.removeEventListener('click', handleButtonClick);
});
</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
        </template>
        <Card>
            <CardHeader>
                <CardTitle>
                    Daftar laporan yang masuk
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