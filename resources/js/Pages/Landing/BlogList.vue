<script setup lang="ts">
import Landing from '@/Layouts/Landing.vue'
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    title: String,
    blogs: Object
})

const truncatedText = (text, length) => {
    return text.length > length ? text.slice(0, length) + "..." : text;
};
</script>

<template>

    <Head>
        <title>{{ title }} - Desa Kaputihan</title>
        <meta name="description"
            content="Daftar Blog Desa Kaputihan" />
    </Head>
    <Landing>
        <div class="page-title light-background">
            <div class="container">
                <h1>Blog Desa</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Blog Desa</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section id="starter-section" class="starter-section section">

            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-3 mb-3" v-for="blog in blogs.data" :key="blog.id">
                        <Link :href="route('landing.readBlog', blog.slug)">
                        <div class="card w-full">
                            <div style="width: 100%; aspect-ratio: 16 / 9; overflow: hidden;">
                                <img :src="blog.thumbnail ? `/storage/${blog.thumbnail}` : '/placeholder/blog.svg'"
                                    class="card-img-top" alt="..."
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ truncatedText(blog.judul, 50) }}</h5>
                                <p class="card-text">{{ truncatedText(blog.konten, 120) }}</p>
                            </div>
                        </div>
                        </Link>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <nav aria-label="Blog navigation">
                        <ul class="pagination">
                            <template v-for="link in blogs.links" :key="link.label">
                                <li class="page-item" :class="{ 'active': link.active, 'disabled': !link.url }">
                                    <Link v-if="link.url" :href="link.url" class="page-link" v-html="link.label" />
                                    <span v-else class="page-link" v-html="link.label" />
                                </li>
                            </template>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </Landing>
</template>

<style scoped></style>