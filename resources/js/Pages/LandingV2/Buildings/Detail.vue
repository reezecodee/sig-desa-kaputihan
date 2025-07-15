<script setup>
import LandingV2 from '@/Layouts/LandingV2.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    title: String
});
</script>

<template>
    <Head :title="title" />
    <LandingV2>
        <section class="hero__v6 section" id="home">
            <div class="container">
                <div class="row g-5">
                    <div class="col-md-6">
                        <div class="map-wrapper ratio ratio-4x3">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.916859424694!2d107.61614237583626!3d-6.90045869309877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64c5e8247db%3A0x4606c79b83e6d56c!2sGedung%20Sate!5e0!3m2!1sen!2sid!4v1721055374823!5m2!1sen!2sid"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <a href="https://maps.app.goo.gl/d25Yg5Y9cqu5sDqZ8" class="btn btn-primary w-100 mt-3"
                            target="_blank" rel="noopener noreferrer">
                            Kunjungi di Google Maps
                        </a>
                    </div>

                    <div class="col-md-6">
                        <img src="https://placehold.co/600x400/198754/white?text=Gedung+Sate"
                            class="img-fluid rounded-3 w-full mb-4">
                        <h1 class="fw-bold display-5">Gedung Sate</h1>

                        <span class="badge text-bg-success fs-6 mb-3">
                            Bangunan Bersejarah
                        </span>

                        <p>
                            Dibangun pada masa pemerintahan kolonial Belanda dan selesai pada tahun 1924, bangunan ini
                            memadukan gaya arsitektur Eropa dengan elemen tradisional Indonesia. Kini, selain berfungsi
                            sebagai pusat pemerintahan, Gedung Sate juga menjadi salah satu tujuan wisata arsitektur
                            paling populer di Bandung.
                        </p>
                    </div>
                </div>

                <hr class="my-5">

                <h2 class="text-center mb-4">Galeri Foto</h2>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-4 col-6">
                        <div data-img-src="https://placehold.co/1200x800/198754/white?text=Foto+1">
                            <img src="https://placehold.co/400x300/198754/white?text=Foto+1"
                                class="img-fluid rounded-3 gallery-item" alt="Galeri Foto Gedung Sate 1">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div data-img-src="https://placehold.co/1200x800/0d6efd/white?text=Foto+2">
                            <img src="https://placehold.co/400x300/0d6efd/white?text=Foto+2"
                                class="img-fluid rounded-3 gallery-item" alt="Galeri Foto Gedung Sate 2">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div data-img-src="https://placehold.co/1200x800/dc3545/white?text=Foto+3">
                            <img src="https://placehold.co/400x300/dc3545/white?text=Foto+3"
                                class="img-fluid rounded-3 gallery-item" alt="Galeri Foto Gedung Sate 3">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div data-img-src="https://placehold.co/1200x800/ffc107/black?text=Foto+4">
                            <img src="https://placehold.co/400x300/ffc107/black?text=Foto+4"
                                class="img-fluid rounded-3 gallery-item" alt="Galeri Foto Gedung Sate 4">
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
