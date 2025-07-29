<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link } from '@inertiajs/vue3'
import { Card, CardHeader, CardContent, CardTitle } from '@/Components/ui/card';
import TableGeneralData from '@/Components/custom/statistics/TableGeneralData.vue';
import Button from '@/components/ui/button/Button.vue';

defineProps({
    title: String,
    id: String,
    category: String,
})

</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
            <Link :href="route('admin.chartMenu', id)">
            <Button class="shadcn-btn delete-btn">
                Kembali
            </Button>
            </Link>
        </template>

        <Card>
            <CardHeader>
                <CardTitle>
                    Daftar data fasilitas.
                </CardTitle>
            </CardHeader>
            <CardContent>
                <TableGeneralData :surveyID="id" :category="category"/>
            </CardContent>
        </Card>
    </App>
</template>

<style scoped></style>