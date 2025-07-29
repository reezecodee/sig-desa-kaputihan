<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import App from '@/Layouts/App.vue';
import FormEdit from '@/Components/custom/profile/FormEdit.vue';
import FormPassword from '@/Components/custom/profile/FormPassword.vue';

defineProps({
    title: String
})
</script>

<template>

    <Head :title="title" />
    <App>
        <template v-slot:header>
            <h2 class="text-3xl font-bold tracking-tight">
                Profile Saya
            </h2>
        </template>
        <FormEdit />
        <br>
        <h2 class="text-2xl font-bold tracking-tight">
            Ganti Password
        </h2>
        <FormPassword />
    </App>
</template>

<style scoped></style>