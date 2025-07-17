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
        <section class="services__v3 section" id="home">
            <div class="container">
                 <div class="row mb-5 mt-5">
                    <div class="col-md-8 mx-auto text-center">
                        <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">
                            Bangunan
                        </span>
                        <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">
                            Bangunan di Desa Kaputihan
                        </h2>
                    </div>
                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" id="searchInput" class="form-control form-control-lg"
                                placeholder="Cari nama atau kategori bangunan...">
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <img src="https://placehold.co/600x400/0d6efd/white?text=Masjid" class="card-img-top"
                                alt="Foto Masjid Al-Ikhlas">
                            <div class="card-body d-flex flex-column">
                                <div>
                                    <span class="badge rounded-pill text-bg-primary mb-2">Bangunan Ibadah</span>
                                </div>
                                <h5 class="card-title">Masjid Al-Ikhlas</h5>
                                <p class="card-text">Masjid Al-Ikhlas adalah masjid pertama yang didirikan di Desa
                                    Kaputihan.</p>
                                <a href="#" class="btn btn-primary mt-auto">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <img src="https://placehold.co/600x400/0d6efd/white?text=Masjid" class="card-img-top"
                                alt="Foto Masjid Al-Ikhlas">
                            <div class="card-body d-flex flex-column">
                                <div>
                                    <span class="badge rounded-pill text-bg-primary mb-2">Bangunan Ibadah</span>
                                </div>
                                <h5 class="card-title">Masjid Al-Ikhlas</h5>
                                <p class="card-text">Masjid Al-Ikhlas adalah masjid pertama yang didirikan di Desa
                                    Kaputihan.</p>
                                <a href="#" class="btn btn-primary mt-auto">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <img src="https://placehold.co/600x400/0d6efd/white?text=Masjid" class="card-img-top"
                                alt="Foto Masjid Al-Ikhlas">
                            <div class="card-body d-flex flex-column">
                                <div>
                                    <span class="badge rounded-pill text-bg-primary mb-2">Bangunan Ibadah</span>
                                </div>
                                <h5 class="card-title">Masjid Al-Ikhlas</h5>
                                <p class="card-text">Masjid Al-Ikhlas adalah masjid pertama yang didirikan di Desa
                                    Kaputihan.</p>
                                <a href="#" class="btn btn-primary mt-auto">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <img src="https://placehold.co/600x400/0d6efd/white?text=Masjid" class="card-img-top"
                                alt="Foto Masjid Al-Ikhlas">
                            <div class="card-body d-flex flex-column">
                                <div>
                                    <span class="badge rounded-pill text-bg-primary mb-2">Bangunan Ibadah</span>
                                </div>
                                <h5 class="card-title">Masjid Al-Ikhlas</h5>
                                <p class="card-text">Masjid Al-Ikhlas adalah masjid pertama yang didirikan di Desa
                                    Kaputihan.</p>
                                <a href="#" class="btn btn-primary mt-auto">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </LandingV2>
</template>

<style scoped>
.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}
</style>