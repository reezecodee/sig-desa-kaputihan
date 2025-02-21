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

const truncatedText = (text) => {
  return text.length > 150 ? text.slice(0, 150) + "" : text;
};
</script>
<template>

    <Head>
        <title>{{ `${blog.judul} - ${title} Desa Kaputihan` }}</title>
        <meta name="description" :content="truncatedText(blog.konten)" />
    </Head>
    <Landing>
        <Blog></Blog>
    </Landing>
</template>

<style scoped></style>