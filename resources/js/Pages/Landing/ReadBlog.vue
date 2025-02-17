<script setup lang="ts">
import Landing from '@/Layouts/Landing.vue'
import Blog from '@/Pages/Landing/section/Blog.vue'

defineProps({
    title: String
})
</script>
<template>
    <Landing :title="title">
        <Blog></Blog>
    </Landing>
</template>

<style scoped></style>