<script setup lang="ts">
import Landing from '@/Layouts/Landing.vue'
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({
    buildings: Object
})

const truncatedText = (text, length) => {
    return text.length > length ? text.slice(0, length) + "" : text;
};
</script>
<template>

    <Head>
        <title>{{ `Daftar Bangunan ${buildings.data?.[0]?.kategori_bangunan} - Desa Kaputihan` }}</title>
        <meta name="description"
            :content="'Daftar Bangunan ' + buildings.data?.[0]?.kategori_bangunan + ' yang ada di Desa Kaputihan'" />
    </Head>

    <Landing>
        <div class="page-title light-background">
            <div class="container">
                <h1>Daftar Bangunan</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li class="current">Daftar Bangunan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section id="starter-section" class="starter-section section">

            <div class="container" data-aos="fade-up">
                <div v-if="buildings.data && buildings.data.length > 0">
                    <div v-if="buildings.data && buildings.data.length > 0"
                        class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                        <div class="col" v-for="building in buildings.data" :key="building.id">
                            <Link :href="route('landing.buildingInformation', building.slug)"
                                class="text-decoration-none">
                            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                                <div class="image-container">
                                    <img :src="building.foto_bangunan ? `/storage/${building.foto_bangunan}` : '/placeholder/blog.svg'"
                                        class="card-img-top" alt="Gambar Bangunan">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold text-dark">{{ truncatedText(building.nama_bangunan,
                                        50) }}
                                    </h5>
                                    <p class="card-text small text-muted">{{ truncatedText(building.deskripsi, 120) }}
                                    </p>
                                </div>
                            </div>
                            </Link>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <nav aria-label="Blog navigation">
                            <ul class="pagination">
                                <template v-for="building in buildings.links" :key="building.label">
                                    <li class="page-item"
                                        :class="{ 'active': building.active, 'disabled': !building.url }">
                                        <Link v-if="building.url" :href="building.url" class="page-link"
                                            v-html="building.label" />
                                        <span v-else class="page-link" v-html="building.label" />
                                    </li>
                                </template>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div v-else>
                    <div class="text-center">
                        <h2>Data bangunan belum ada</h2>
                    </div>
                </div>
            </div>
        </section>
    </Landing>
</template>

<style scoped></style>