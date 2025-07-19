<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const village = computed(() => page.props.village);

const year = new Date().getFullYear();
</script>

<template>
    <footer class="footer pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-between mb-5 g-xl-5">
                <div class="col-md-5 mb-5 mb-lg-0">
                    <h3 class="mb-3">Tentang</h3>
                    <p class="mb-4">
                        Nama Desa Kaputihan di Jatiwaras, Tasikmalaya, tidak berasal dari kabut, melainkan dari fenomena
                        keramat "nampak putih" yang muncul di makam leluhurnya, Entol Wiraha, pada tahun 1912.
                    </p>
                </div>
                <div class="col-md-7">
                    <div class="row g-2">
                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                            <h3 class="mb-3">Pintasan Cepat</h3>
                            <ul class="list-unstyled">
                                <li>
                                    <a :href="route('landing.home') + '#home'">Home</a>
                                </li>
                                <li>
                                    <a :href="route('landing.home') + '#about'">Tentang Desa</a>
                                </li>
                                <li>
                                    <a :href="route('landing.home') + '#organization'">Struktur Organisasi</a>
                                </li>
                                <li>
                                    <a :href="route('landing.home') + '#condition'">Kondisi Desa</a>
                                </li>
                                <li>
                                    <a :href="route('landing.home') + '#count-village'">Data Jumlah</a>
                                </li>
                                <li>
                                    <a :href="route('landing.home') + '#building-category'">Kategori Bangunan</a>
                                </li>
                                <li>
                                    <a :href="route('landing.home') + '#faq'">FAQ</a>
                                </li>
                                <li>
                                    <a :href="route('landing.home') + '#report'">Laporkan Masalah</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                            <h3 class="mb-3">Tautan Aplikasi</h3>
                            <ul class="list-unstyled">
                                <li>
                                    <Link :href="route('landing.home')">Home</Link>
                                </li>
                                <li>
                                    <Link :href="route('landing.map')">Batas Wilayah</Link>
                                </li>
                                <li>
                                    <Link :href="route('landing.statistics')">Statistik Desa</Link>
                                </li>
                                <li>
                                    <Link :href="route('landing.buildings')">Bangunan Desa</Link>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 quick-contact">
                            <h3 class="mb-3">Kontak Kami</h3>
                            <a class="d-flex mb-3" href="mailto:info@mydomain.com">
                                <i class="bi bi-envelope-fill me-3"></i>
                                <span>{{ village.email }}</span>
                            </a>
                            <a class="d-flex mb-3" href="tel://+123456789900">
                                <i class="bi bi-telephone-fill me-3"></i>
                                <span>{{ village.telepon }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row credits pt-3">
                <div class="col-xl-8 text-center text-xl-start mb-3 mb-xl-0">
                    &copy; {{ year }} Desa Kaputihan. All rights reserved.
                </div>
                <div
                    class="col-xl-4 justify-content-start justify-content-xl-end quick-links d-flex flex-column flex-xl-row text-center text-xl-start gap-1">
                    Bekerja sama dengan Universitas BSI Kota Tasikmalaya.
                </div>
            </div>
        </div>
    </footer>
</template>
