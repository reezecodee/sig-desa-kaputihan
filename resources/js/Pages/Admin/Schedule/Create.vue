<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import App from '@/Layouts/App.vue'
import { Button } from '@/Components/ui/button'
import CreateSchedule from '@/Components/custom/schedule/CreateSchedule.vue'

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
                <Link :href="route('admin.schedule')">
                <Button>Kembali</Button>
                </Link>
            </div>
        </template>
        <CreateSchedule />
    </App>
</template>

<style scoped></style>