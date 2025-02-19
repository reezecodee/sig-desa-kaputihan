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
                        <img src="/placeholder/kantor-desa.jpg" class="img-fluid rounded shadow-sm"
                            alt="Kantor Desa Kaputihan">
                        <figcaption>
                            <h4 class="mt-3">{{ building.nama_bangunan }}</h4>
                            <p>{{ building.deskripsi }}</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="ratio ratio-16x9">
                        <div v-html="building.google_maps"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<style scoped></style>