<script setup>
import LandingV2 from '@/Layouts/LandingV2.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    title: String,
    detailBuilding: Object,
    buildingPhotos: Object
});
</script>

<template>

    <Head>
        <title>{{ title }}</title>
        <meta name="description"
            :content="detailBuilding.deskripsi">
    </Head>
    <LandingV2>
        <section class="hero__v6 section" id="home">
            <div class="container">
                <div class="row g-5">
                    <div class="col-md-6">
                        <div class="map-wrapper ratio ratio-4x3" v-html="detailBuilding.google_maps">

                        </div>
                        <a :href="detailBuilding.link_lokasi" class="btn btn-primary w-100 mt-3" target="_blank"
                            rel="noopener noreferrer">
                            Kunjungi di Google Maps
                        </a>
                    </div>

                    <div class="col-md-6">
                        <img :src="`/storage/foto-bangunan/${detailBuilding.foto_bangunan}`" style="height: 400px;"
                            class="img-fluid rounded-3 w-full mb-4">
                    </div>
                </div>

                <h1 class="fw-bold display-5 mt-5">{{ detailBuilding.nama_bangunan }}</h1>
                <span class="badge text-bg-success fs-6 mb-3">
                    {{ detailBuilding.category.nama_kategori }}
                </span>
                <p v-html="detailBuilding.deskripsi">
                </p>

                <div v-if="buildingPhotos.length >= 1">
                    <hr class="my-5">

                    <h2 class="text-center fw-bold mb-5">Galeri Foto</h2>
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-4 col-6" v-for="item in buildingPhotos" :key="item.id">
                            <div :data-img-src="`/storage/foto-bangunan/${item.nama_file}`">
                                <img :src="`/storage/foto-bangunan/${item.nama_file}`"
                                    class="img-fluid rounded-3 gallery-item" style="width: 400; height: 300;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </LandingV2>
</template>

<style scoped>
.map-wrapper {
    border-radius: 0.5rem;
    overflow: hidden;
}

.gallery-item {
    cursor: pointer;
    transition: transform 0.2s ease-in-out;
}

.gallery-item:hover {
    transform: scale(1.05);
}
</style>
