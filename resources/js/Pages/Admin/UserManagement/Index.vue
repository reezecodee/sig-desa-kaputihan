<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link, router } from '@inertiajs/vue3'
import Button from '@/components/ui/button/Button.vue';
import { Card, CardHeader, CardContent, CardTitle } from '@/Components/ui/card';
import Table from '@/Components/custom/user-management/Table.vue';
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

defineProps({
  title: String
})

const redirectToEdit = (id) => {
  router.visit(route('admin.userEdit', id), {
    preserveState: false
  })
}

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
  router.delete(route("admin.userDestroy", selectedId.value), {
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
        <Link :href="route('admin.userCreate')">
        <Button class="shadcn-btn edit-btn"><i class="fa-solid fa-plus"></i> Tambah Pengguna Baru</Button>
        </Link>
      </div>
    </template>

    <Card>
      <CardHeader>
        <CardTitle>
          Daftar pengguna aplikasi
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