<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { inject } from 'vue'

const village = inject('village');

const year: Date = new Date().getFullYear()
</script>

<template>
    <footer id="footer" class="footer">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="" class="logo d-flex align-items-center">
                        <span class="sitename">{{ village.nama_aplikasi }}</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Jalan Kaputihan, Desa Kaputihan</p>
                        <p>Kabupaten Tasikmalaya, Jawa Barat</p>
                        <p class="mt-3"><strong>Telepon:</strong> <span>
                                {{ village.telepon }}</span></p>
                        <p><strong>Email:</strong> <span>{{ village.email }}</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Link Website</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#batas-wilayah">Batas Wilayah</a></li>
                        <li><a href="#statistik-desa">Statistik Desa</a></li>
                        <li><a href="#bangunan">Bangunan</a></li>
                        <li>
                            <Link :href="route('landing.blog')">Blog Desa</Link>
                        </li>
                        <li>
                            <Link :href="route('landing.schedule')">Jadwal Kegiatan</Link>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Layanan Desa</h4>
                    <ul>
                        <li><a target="_blank" href="https://kaputihan.desa.id/permohonan/">Permohonan Online</a></li>
                        <li><a target="_blank" href="https://kaputihan.desa.id/kontak/">Lapor, Aduan, dan Saran</a></li>
                        <li><a target="_blank" href="https://kaputihan.desa.id/produk-warga/">Produk Desa</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Tentang Desa</h4>
                    <ul>
                        <li><a target="_blank" href="https://kaputihan.desa.id/tentang/sejarah/">Sejarah Desa</a></li>
                        <li><a target="_blank" href="https://kaputihan.desa.id/tentang/wilayah/">Wilayah</a></li>
                        <li><a target="_blank" href="https://kaputihan.desa.id/tentang/statistik/">Statistik</a></li>
                        <li><a target="_blank" href="https://kaputihan.desa.id/kategori/potensi-desa/">Potensi</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Lembaga Desa</h4>
                    <ul>
                        <li><a target="_blank" href="https://kaputihan.desa.id/lembaga/pemerintahan/">Pemerintahan</a>
                        </li>
                        <li><a target="_blank" href="https://kaputihan.desa.id/lembaga/bpd/">BPD</a></li>
                        <li><a target="_blank" href="https://kaputihan.desa.id/lembaga/lpm/">LPM</a></li>
                        <li><a target="_blank" href="https://kaputihan.desa.id/lembaga/posyandu/">Posyandu</a></li>
                        <li><a target="_blank" href="https://kaputihan.desa.id/lembaga/pkk/">PKK</a></li>
                        <li><a target="_blank" href="https://kaputihan.desa.id/lembaga/karang-taruna/">Karang Taruna</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>©{{ year }} Desa Kaputihan. Semua hak cipta dilindungi.
            </p>
            <div class="credits">
                Bekerja sama dengan Tim BSI Explore 2025 Universitas BSI Kampus Kota Tasikmalaya
            </div>
        </div>

    </footer>
</template>

<style scoped></style>