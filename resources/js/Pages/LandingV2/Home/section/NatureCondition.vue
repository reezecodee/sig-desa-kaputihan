<script setup>
defineProps({
    villageProfile: Object
});
</script>

<template>
    <section class="section features__v2" id="condition">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-lg-flex p-5 rounded-4 content" data-aos="fade-in" data-aos-delay="0">
                        <div class="row">
                            <div class="col-lg-5 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="0">
                                <div class="row">
                                    <div class="col-lg-11">
                                        <div class="h-100 flex-column justify-content-between d-flex">
                                            <div>
                                                <h2 class="mb-4">Kondisi Desa</h2>
                                                <p class="mb-5">
                                                    Sesuai dengan lokasinya di Kabupaten Tasikmalaya, kondisi alam di
                                                    Desa Kaputihan sangat khas dengan topografi perbukitan Priangan
                                                    Timur yang sejuk. Nama 'Kaputihan' seolah menjadi cerminan
                                                    suasananya, di mana pada pagi atau sore hari, kabut putih seringkali
                                                    turun perlahan dari lereng-lereng bukit, menyelimuti area persawahan
                                                    dan lembah di bawahnya.
                                                </p>
                                            </div>
                                            <div class="align-self-start">
                                                <a class="glightbox btn btn-play d-inline-flex align-items-center gap-2"
                                                    href="https://maps.app.goo.gl/ua96PjPbuxVyDtED8" target="_blank">
                                                    <i class="bi bi-geo-alt-fill"></i> Cek kami di Google Maps
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="row justify-content-end">
                                    <div class="col-lg-11">
                                        <div class="row">
                                            <div class="col-sm-6" data-aos="fade-up" data-aos-delay="0">
                                                <div class="icon text-center mb-4">
                                                    <i class="bi bi-thermometer-sun fs-4"></i>
                                                </div>
                                                <h3 class="fs-6 fw-bold mb-3">
                                                    Suhu Rata-rata
                                                </h3>
                                                <p>
                                                    Suhu rata-rata {{ villageProfile.suhu_rata_rata }} derajat celcius.
                                                </p>
                                            </div>
                                            <div class="col-sm-6" data-aos="fade-up" data-aos-delay="100">
                                                <div class="icon text-center mb-4">
                                                    <i class="bi bi-pin-map-fill fs-4"></i>
                                                </div>
                                                <h3 class="fs-6 fw-bold mb-3">
                                                    Lokasi Elevasi
                                                </h3>
                                                <p>
                                                    Desa Kaputihan berada di ketinggian {{ villageProfile.lokasi_elevasi }}.
                                                </p>
                                            </div>
                                            <div class="col-sm-6" data-aos="fade-up" data-aos-delay="200">
                                                <div class="icon text-center mb-4">
                                                    <i class="bi bi-map-fill fs-4"></i>
                                                </div>
                                                <h3 class="fs-6 fw-bold mb-3">
                                                    Luas Wilayah
                                                </h3>
                                                <p>
                                                    Luas wilayah Desa Kaputihan berkisar {{ villageProfile.luas_wilayah }}
                                                </p>
                                            </div>
                                            <div class="col-sm-6" data-aos="fade-up" data-aos-delay="300">
                                                <div class="icon text-center mb-4">
                                                    <i class="bi bi-geo-alt-fill fs-4"></i>
                                                </div>
                                                <h3 class="fs-6 fw-bold mb-3">
                                                    Lokasi Desa
                                                </h3>
                                                <p>
                                                    {{ villageProfile.alamat_desa }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>