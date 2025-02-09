<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import App from '@/Layouts/App.vue';

defineProps({
    title: String
})
</script>

<template>

    <Head :title="title" />

    
    <App>

    </App>
</template>

<style scoped></style>