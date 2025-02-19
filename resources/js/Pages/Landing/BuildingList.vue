<script setup lang="ts">
import Landing from '@/Layouts/Landing.vue'
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    title: String,
    buildings: Object
})
</script>
<template>

    <Head :title="title" />
    <Landing>
        <div class="page-title light-background">
            <div class="container">
                <h1>Daftar Bangunan</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Daftar Bangunan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section id="starter-section" class="starter-section section">

            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-3 mb-3" v-for="building in buildings.data" :key="building.id">
                        <Link :href="route('landing.buildingInformation', building.id)">
                        <div class="card w-full">
                            <img
                                :src="building.foto_bangunan ? `/storage/${building.foto_bangunan}` : '/placeholder/blog.svg'">
                            <div class="card-body">
                                <h5 class="card-title">{{ building.nama_bangunan }}</h5>
                                <p class="card-text">{{ building.deskripsi }}</p>
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
                                    <Link v-if="building.url" :href="building.url" class="page-link" v-html="building.label" />
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