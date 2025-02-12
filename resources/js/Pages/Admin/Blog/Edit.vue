<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, Link } from '@inertiajs/vue3'
import { Button } from '@/Components/ui/button'
import EditBlog from '@/Components/custom/blog/EditBlog.vue'
import { provide, shallowReactive } from 'vue'

const props = defineProps<{ 
    title: string,               
    blog: Record<string, string>,
}>()

const reactiveBlog = shallowReactive(props.blog)

provide('blog', reactiveBlog)
</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
            <div class="flex items-center space-x-2">
                <Link :href="route('admin.blog')">
                <Button>Kembali</Button>
                </Link>
            </div>
        </template>
        <div class="flex justify-center">
            <EditBlog />
        </div>
    </App>
</template>

<style scoped></style>