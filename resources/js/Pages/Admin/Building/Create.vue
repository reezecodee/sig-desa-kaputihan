<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link } from '@inertiajs/vue3'
import Button from '@/components/ui/button/Button.vue'
import CreateBuilding from '@/Components/custom/building/CreateBuilding.vue'

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
                <Link :href="route('admin.building')">
                <Button class="shadcn-btn back-btn">Kembali</Button>
                </Link>
            </div>
        </template>
        <div class="flex justify-center">
            <CreateBuilding />
        </div>
    </App>
</template>

<style scoped></style>