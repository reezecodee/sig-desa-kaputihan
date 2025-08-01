<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, router } from '@inertiajs/vue3';
import { Card, CardHeader, CardContent, CardTitle } from '@/Components/ui/card';
import { onMounted, onUnmounted, ref } from 'vue'
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
import axios from 'axios';

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

  router.delete(route("admin.destroySurvey", selectedId.value))
  showDialog.value = false;
};

const updateStatus = async (id: string, status: string): Promise<void> => {
  console.log(`Mengirim update untuk ID: ${id}, Status baru: ${status}`);

  const selectElement = document.querySelector<HTMLSelectElement>(`.status-select[data-id="${id}"]`);

  if (selectElement) {
    selectElement.disabled = true;
  }

  try {
    await axios.patch(route('admin.surveyUpdateStatus', id), {
      diaktifkan: status
    });

    router.visit(window.location.href, {
      preserveScroll: true,
    });
  } catch (error) {
    if (selectElement) {
      selectElement.value = status === 'Ya' ? 'Tidak' : 'Ya';
    }
  } finally {
    if (selectElement) {
      selectElement.disabled = false;
    }
  }
};

const handleTableChange = (event: Event): void => {
  if (event.target instanceof HTMLSelectElement && event.target.classList.contains('status-select')) {
    const target = event.target;
    const id = target.dataset.id;
    const newValue = target.value;

    if (id) {
      updateStatus(id, newValue);
    }
  }
};

const handleButtonClick = (event: Event): void => {
  if (event.target instanceof HTMLElement) {
    const targetElement = event.target;
    const id = targetElement.getAttribute('data-id');

    if (targetElement.classList.contains('delete-btn')) {
      confirmDelete(id);
    } else if (targetElement.classList.contains('detail-btn')) {
      redirectToDetail(id);
    }
  }
}

const redirectToDetail = (id: string) => {
  router.visit(route('admin.chartMenu', id), {
    preserveState: false
  })
}

onMounted(() => {
  document.addEventListener('change', handleTableChange);
  document.addEventListener('click', handleButtonClick)
});

onUnmounted(() => {
  document.removeEventListener('change', handleTableChange);
  document.removeEventListener('click', handleButtonClick)
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