<script setup lang="ts">
import { inject } from 'vue'

const building = inject('building')
</script>

<template>
    <section id="building-info" class="service-details section mt-5">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <figure class="text-center">
                        <div style="width: 100%; aspect-ratio: 16 / 9; overflow: hidden;">
                            <img :src="building.foto_bangunan ? `/storage/${building.foto_bangunan}` : '/placeholder/blog.svg'"
                                class="img-fluid rounded shadow-sm" alt="Bangunan Desa Kaputihan"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <figcaption>
                            <h4 class="mt-3">{{ building.nama_bangunan }}</h4>
                            <p class="text-start">{{ building.deskripsi }}</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="ratio ratio-16x9">
                        <div v-html="building.google_maps"></div>
                    </div>
                    <div class="d-flex justify-content-center mt-3" v-if="building.link_lokasi">
                        <a :href="building.link_lokasi" target="_blank">
                            <button class="btn btn-primary">Lihat di Google Maps</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<style scoped></style>