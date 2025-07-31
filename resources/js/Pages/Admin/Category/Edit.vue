<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link } from '@inertiajs/vue3'
import Button from '@/components/ui/button/Button.vue';
import EditCategory from '@/Components/custom/category/EditCategory.vue';

defineProps({
    title: String,
    category: Object,
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
                <Link :href="route('admin.category')">
                <Button class="shadcn-btn back-btn">Kembali</Button>
                </Link>
            </div>
        </template>
        <div class="flex justify-center">
            <EditCategory :category="category" />
        </div>
    </App>
</template>

<style scoped></style>