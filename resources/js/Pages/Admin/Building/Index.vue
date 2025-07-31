<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link, router } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';
import { onMounted, ref } from 'vue';
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

const redirectToEdit = (id) => {
  router.visit(route('admin.buildingEdit', id), {
    preserveState: false
  })
}

const showDialog = ref(false);
const selectedId = ref(null);

const confirmDelete = (id: string) => {
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
        <Link :href="route('admin.category')">
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