<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head } from '@inertiajs/vue3'
import { Button } from '@/Components/ui/button'
import Table from '@/Components/custom/blog/Table.vue';

defineProps({
    title: String
})
</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                Blog
            </h2>
            <div class="flex items-center space-x-2">
                <Button>Buat Blog Baru</Button>
            </div>
        </template>
        <Table></Table>
    </App>
</template>

<style scoped></style>