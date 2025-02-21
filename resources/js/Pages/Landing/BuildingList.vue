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
        <meta name="description" :content="'Daftar Bangunan ' + buildings.data?.[0]?.kategori_bangunan + ' yang ada di Desa Kaputihan'" />
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
                <div class="row">
                    <div class="col-md-3 mb-3" v-for="building in buildings.data" :key="building.id">
                        <Link :href="route('landing.buildingInformation', building.slug)">
                        <div class="card w-full">
                            <div style="width: 100%; aspect-ratio: 16 / 9; overflow: hidden;">
                                <img :src="building.foto_bangunan ? `/storage/${building.foto_bangunan}` : '/placeholder/blog.svg'"
                                    class="card-img-top" alt="..."
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ truncatedText(building.nama_bangunan, 50) }}</h5>
                                <p class="card-text small">{{ truncatedText(building.deskripsi, 120) }}</p>
                            </div>
                        </div>
                        </Link>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <nav aria-label="Blog navigation">
                        <ul class="pagination">
                            <template v-for="building in buildings.links" :key="building.label">
                                <li class="page-item" :class="{ 'active': building.active, 'disabled': !building.url }">
                                    <Link v-if="building.url" :href="building.url" class="page-link"
                                        v-html="building.label" />
                                    <span v-else class="page-link" v-html="building.label" />
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