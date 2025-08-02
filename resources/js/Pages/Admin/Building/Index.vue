<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link, router } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';
import { onMounted, onUnmounted, ref } from 'vue';
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
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';
import BuildingTable from '@/Components/custom/building/BuildingTable.vue';

defineProps({
  title: String,
  categoryID: String,
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
  router.delete(route("admin.buildingDestroy", selectedId.value), {
    onFinish: () => {
      showDialog.value = false;
      selectedId.value = null;
    },
  });
};

const redirectToDetail = (slug: string) => {
  router.visit(route('landing.detailBuilding', slug), {
    preserveState: false
  })
}

const redirectToEdit = (id: string) => {
  router.visit(route('admin.buildingEdit', id), {
    preserveState: false
  })
}

const handleButtonClick = (event: Event): void => {
  if (event.target instanceof HTMLElement) {
    const targetElement = event.target;
    const id = targetElement.getAttribute('data-id');

    if (targetElement.classList.contains('delete-btn')) {
      confirmDelete(id);
    } else if (targetElement.classList.contains('edit-btn')) {
      redirectToEdit(id);
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
      <div class="flex items-center space-x-2">
        <Link :href="route('admin.category', categoryID)">
        <Button class="shadcn-btn back-btn">Kembali</Button>
        </Link>
      </div>
    </template>

    <Card>
      <CardHeader>
        <CardTitle>
          Daftar bangunan desa.
        </CardTitle>
      </CardHeader>
      <CardContent>
        <div class="flex justify-end mb-4">
          <Link :href="route('admin.buildingCreate', categoryID)">
          <Button class="shadcn-btn edit-btn">Tambah Bangunan</Button>
          </Link>
        </div>
        <BuildingTable :categoryID="categoryID" />
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