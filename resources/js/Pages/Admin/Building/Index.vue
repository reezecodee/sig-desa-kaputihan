<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link, router } from '@inertiajs/vue3';
import { Button } from '@/Components/ui/button';
import { onMounted, ref } from 'vue';
import {
  AlertDialog,
  AlertDialogTrigger,
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
  router.visit(route('admin.buildingEdit', id), {
    preserveState: false
  })
}

const showDialog = ref(false);
const selectedId = ref(null);

const confirmDelete = (id) => {
  selectedId.value = id;
  showDialog.value = true;
};

const deleteData = () => {
  if (!selectedId.value) return;

  router.delete(route("admin.buildingDestroy", selectedId.value))
  showDialog.value = false;
};

onMounted(() => {
  document.addEventListener('click', function (event) {
    if (event.target.classList.contains('delete-btn')) {
      const id = event.target.getAttribute('data-id')
      confirmDelete(id)
    } else if (event.target.classList.contains('edit-btn')) {
      const id = event.target.getAttribute('data-id')
      redirectToEdit(id)
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
        <Link :href="route('admin.buildingCreate')">
        <Button class="shadcn-btn detail-btn">Tambah Bangunan Baru</Button>
        </Link>
      </div>
    </template>
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