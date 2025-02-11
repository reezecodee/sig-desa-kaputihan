<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head } from '@inertiajs/vue3'
import Table from '@/Components/custom/complaint/Table.vue';

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
        </template>
        <Table></Table>
    </App>
</template>

<style scoped></style>