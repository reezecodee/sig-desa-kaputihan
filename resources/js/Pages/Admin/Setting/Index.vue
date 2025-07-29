<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head } from '@inertiajs/vue3'
import FormSetting from '@/Components/custom/setting/FormSetting.vue'
import { provide, shallowReactive } from 'vue'


const props = defineProps<{ 
    title: string,               
    village: Record<string, string>,
}>()

const reactiveVillage = shallowReactive(props.village)

provide('village', reactiveVillage)
</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
        </template>
        <FormSetting />
    </App>
</template>

<style scoped></style>