<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue';

const village = computed(() => usePage().props.village)
</script>

<template>
    <section id="tentang" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 align-items-center justify-content-between">

                <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                    <span class="about-meta">Tentang Desa</span>
                    <h2 class="about-title">Sejarah nama Desa Kaputihan</h2>
                    <p class="about-description">
                        Pada tahun 1912, banjir besar di Kali Cipinaha merusak Makam Cinutug, yang ternyata merupakan
                        makam Entol
                        Wiraha (Dalem Dayeuh Tengah). Setelah ditemukan dan dimakamkan kembali, muncul fenomena nampak
                        putih di
                        dalam air makam tersebut. Karena peristiwa ini, makam berganti nama menjadi Makam Kaputihan.
                    </p>
                    <p class="about-description">
                        Melihat kejadian yang dianggap keramat dan untuk menghormati tokoh yang dimakamkan, para Sesepuh
                        desa
                        bermusyawarah dan memutuskan mengganti nama desa menjadi Desa Kaputihan. Nama ini digunakan
                        hingga saat
                        ini sebagai simbol wibawa dan kepemimpinan yang diwariskan oleh Entol Wiraha.</p>
                    <div class="info-wrapper">
                        <div class="row gy-4">
                            <div class="col-lg-12">
                                <div class="profile d-flex align-items-center gap-3">
                                    <img :src="village.foto ? `/storage/${village.foto}` : '/placeholder/kepdes.webp'"
                                        alt="Kepala Desa" class="profile-image border">
                                    <div>
                                        <h4 class="profile-name">{{ village.nama_kades }}</h4>
                                        <p class="profile-position">Kepala Desa Kaputihan, Periode {{ village.periode }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="image-wrapper">
                        <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                            <img src="/placeholder/kantor-desa.jpg" alt="Business Meeting"
                                class="img-fluid main-image rounded-4">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
</template>

<style scoped></style>