<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link, usePage, router } from '@inertiajs/vue3'
import { Button } from '@/Components/ui/button'
import Table from '@/Components/custom/user-management/Table.vue';
import { onMounted } from 'vue'
import axios from 'axios'

defineProps({
    title: String
})

const { props } = usePage()

const redirectToEdit = (id) => {
  router.visit(route('admin.userEdit', id), {
    preserveState: false
  })
}

const deleteData = (id) => {
  if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
    axios.delete(route('admin.userDestroy', id))
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
                <Link :href="route('admin.userCreate')">
                    <Button>Tambah Pengguna Baru</Button>
                </Link>
            </div>
        </template>
        <Table></Table>
    </App>
</template>

<style scoped></style>