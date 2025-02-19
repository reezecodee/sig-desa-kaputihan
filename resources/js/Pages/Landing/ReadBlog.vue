<script setup lang="ts">
import Landing from '@/Layouts/Landing.vue'
import Blog from '@/Pages/Landing/section/Blog.vue'
import { Head } from '@inertiajs/vue3'
import { provide } from 'vue'

const props = defineProps({
    title: String,
    blog: Object
})

provide('blog', props.blog)
</script>
<template>

    <Head :title="title" />
    <Landing>
        <Blog></Blog>
    </Landing>
</template>

<style scoped></style>