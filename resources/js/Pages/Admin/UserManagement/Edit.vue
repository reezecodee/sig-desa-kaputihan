<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link } from '@inertiajs/vue3'
import { Button } from '@/Components/ui/button'
import EditUser from '@/Components/custom/user-management/EditUser.vue';
import { provide, shallowReactive } from 'vue';

const props = defineProps<{ 
    title: string,               
    user: Record<string, string>,
}>()

const reactiveUser = shallowReactive(props.user)
provide('user', reactiveUser)
</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
            <div class="flex items-center space-x-2">
                <Link :href="route('admin.userManagement')">
                <Button class="shadcn-btn delete-btn">Kembali</Button>
                </Link>
            </div>
        </template>
        <div class="flex justify-center">
            <img src="/placeholder/profile.png" alt="" srcset=""
                style="width: 120px; aspect-ratio: 1 / 1; object-fit: cover;">
        </div>
        <div class="flex justify-center">
            <EditUser />
        </div>
    </App>
</template>

<style scoped></style>