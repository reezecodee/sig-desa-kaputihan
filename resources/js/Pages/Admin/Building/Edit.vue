<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link } from '@inertiajs/vue3'
import Button from '@/components/ui/button/Button.vue'
import EditBuilding from '@/Components/custom/building/EditBuilding.vue'
import { provide, shallowReactive } from 'vue'

const props = defineProps<{ 
    title: string,               
    building: Record<string, string>,
}>()

const reactiveBuilding = shallowReactive(props.building)

provide('building', reactiveBuilding)
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
                <Button class="shadcn-btn delete-btn">Kembali</Button>
                </Link>
            </div>
        </template>
        <div class="flex justify-center">
            <EditBuilding />
        </div>
    </App>
</template>

<style scoped></style>