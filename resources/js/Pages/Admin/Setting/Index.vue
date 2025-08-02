<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head } from '@inertiajs/vue3'
import FormSetting from '@/Components/custom/setting/FormSetting.vue'

defineProps<{ 
    title: string,               
    village: Record<string, string>,
}>()
</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
        </template>
        <FormSetting :village="village" />
    </App>
</template>

<style scoped></style>