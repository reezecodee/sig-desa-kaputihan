<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue';

const village = computed(() => usePage().props.village)
</script>

<template>
    <section id="home" class="hero section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                        <h1 class="mb-4">
                            Selamat Datang di <br>
                            Sistem Informasi GIS <br>
                            <span class="accent-text">Desa Kaputihan</span>
                        </h1>

                        <p class="mb-4 mb-md-5">
                            Pemerintah Desa Kaputihan berkomitmen penuh melayani masyarakat guna menjadikan desa yang
                            mandiri dan
                            terus bertumbuh bersama dengan masyarakat.
                        </p>

                        <div class="hero-buttons">
                            <a :href="route('login')" class="btn btn-primary me-0 me-sm-2 mx-1">Ayo Mulai</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                        <img src="/placeholder/hero-img.png" alt="Hero Image" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-rulers"></i>
                        </div>
                        <div class="stat-content">
                            <h4>Lokasi Elevasi</h4>
                            <p class="mb-0">500-700 mdpl</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-thermometer-high"></i>
                        </div>
                        <div class="stat-content">
                            <h4>Suhu rata-rata</h4>
                            <p class="mb-0">27 s.d 30 Derajat Celcius</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-arrows-fullscreen"></i>
                        </div>
                        <div class="stat-content">
                            <h4>Luas Wilayah</h4>
                            <p class="mb-0">806 Hektar</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="stat-content">
                            <h4>Jumlah Penduduk</h4>
                            <p class="mb-0">{{ village.jumlah_penduduk }} Jiwa</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
</template>

<style scoped></style>