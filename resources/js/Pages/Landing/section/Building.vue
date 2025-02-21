<script setup lang="ts">
import { inject } from 'vue'

const building = inject('building')
</script>

<template>
    <section id="building-info" class="service-details section mt-5">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <figure>
                        <div style="width: 100%; aspect-ratio: 16 / 9; overflow: hidden;">
                            <img :src="building.foto_bangunan ? `/storage/${building.foto_bangunan}` : '/placeholder/blog.svg'"
                                class="img-fluid rounded shadow-sm" alt="Bangunan Desa Kaputihan"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <figcaption>
                            <h4 class="mt-3 fw-bold">{{ building.nama_bangunan }}</h4>
                            <p>{{ building.deskripsi }}</p>
                            <p><b>Kategori bangunan:</b> {{ building.kategori_bangunan }}</p>
                        </figcaption>
                    </figure>
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                    <div class="d-flex justify-content-center">
                        <div>
                            <div v-html="building.google_maps" class="w-full"></div>
                            <div class="d-flex justify-content-center mt-3">
                                <a :href="building.link_lokasi" target="_blank" class="btn btn-primary">
                                    Lihat di Google Maps
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<style scoped></style>