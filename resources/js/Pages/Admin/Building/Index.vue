<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link, router } from '@inertiajs/vue3';
import { Button } from '@/Components/ui/button';
import { onMounted } from 'vue';
import axios from 'axios'


defineProps({
    title: String
})

const redirectToEdit = (id) => {
  router.visit(route('admin.buildingEdit', id), {
    preserveState: false
  })
}

const deleteData = (id) => {
  if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
    axios.delete(route('admin.buildingDestroy', id))
      .then(response => {
        alert('Data berhasil dihapus.')
        location.reload()
      })
      .catch(error => {
        console.error(error)
        alert('Gagal menghapus data.')
      })
  }
}

onMounted(() => {
  document.addEventListener('click', function (event) {
    if (event.target.classList.contains('delete-btn')) {
      const id = event.target.getAttribute('data-id')
      deleteData(id)
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
                <Button>Tambah Bangunan Baru</Button>
                </Link>
            </div>
        </template>
    </App>
</template>

<style scoped></style>