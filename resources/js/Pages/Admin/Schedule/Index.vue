<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head } from '@inertiajs/vue3';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';
import { Button } from '@/Components/ui/button';
import Table from '@/Components/custom/schedule/Table.vue';
import Calendar from '@/Components/custom/schedule/Calendar.vue';

defineProps({
    title: String
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
                <Button>Buat Jadwal Baru</Button>
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