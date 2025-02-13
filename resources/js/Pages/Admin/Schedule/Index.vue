<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link } from '@inertiajs/vue3';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';
import { Button } from '@/Components/ui/button';
import Table from '@/Components/custom/schedule/Table.vue';
import Calendar from '@/Components/custom/schedule/Calendar.vue';
import { onMounted } from 'vue'
import axios from 'axios'

defineProps({
    title: String
})

const deleteData = (id) => {
  if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
    axios.delete(route('admin.scheduleDestroy', id))
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
                <Link :href="route('admin.scheduleCreate')">
                <Button>Buat Jadwal Baru</Button>
                </Link>
            </div>
        </template>
        <Card>
            <CardHeader>
                <CardTitle>
                    Kalender Kegiatan
                </CardTitle>
            </CardHeader>
            <CardContent>
                <!-- <Calendar></Calendar> -->
            </CardContent>
        </Card>
        <Card>
            <CardHeader>
                <CardTitle>
                    Daftar Jadwal Yang Sudah Dibuat
                </CardTitle>
            </CardHeader>
            <CardContent>
                <Table></Table>
            </CardContent>
        </Card>
    </App>
</template>

<style scoped></style>