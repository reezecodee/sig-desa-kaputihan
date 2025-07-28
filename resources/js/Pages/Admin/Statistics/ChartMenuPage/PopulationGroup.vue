<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head } from '@inertiajs/vue3'
import { Card, CardHeader, CardContent, CardTitle } from '@/Components/ui/card';
import TablePopulationGroups from '@/Components/custom/statistics/TablePopulationGroups.vue';

defineProps({
    title: String,
    id: String,
})
</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
        </template>

        <Card>
            <CardHeader>
                <CardTitle>
                    Daftar data fasilitas.
                </CardTitle>
            </CardHeader>
            <CardContent>
                <TablePopulationGroups :surveyID="id"/>
            </CardContent>
        </Card>
    </App>
</template>

<style scoped></style>