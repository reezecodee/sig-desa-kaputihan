<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, router } from '@inertiajs/vue3';
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';
import FormCategory from '@/Components/custom/category/FormCategory.vue';
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
import Table from '@/Components/custom/category/Table.vue';

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
            <div class="flex items-center space-x-2">
                <FormCategory/>
            </div>
        </template>
        <Card>
            <CardHeader>
                <CardTitle>
                    Daftar kategori bangunan
                </CardTitle>
            </CardHeader>
            <CardContent>
                <Table/>
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