<template>
    <section class="hero__v6 section" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="row">
                        <div class="col-lg-11">
                            <span class="hero-subtitle text-uppercase" data-aos="fade-up" data-aos-delay="0">
                                Sistem Informasi Geografis Desa Kaputihan
                            </span>
                            <h1 class="hero-title mb-3" data-aos="fade-up" data-aos-delay="100">
                                Menjelajahi Batas
                                dan Potensi Desa Kaputihan dalam Satu Peta
                            </h1>
                            <p class="hero-description mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="200">
                                Memberdayakan masyarakat dan aparat desa dengan informasi geografis yang akurat
                                untuk pengambilan keputusan strategis.
                            </p>
                            <div class="cta d-flex gap-2 mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="300">
                                <a class="btn" :href="route('login')">Mulai Sekarang</a>
                                <a class="btn btn-white-outline" href="https://kaputihan.desa.id/" target="_blank">
                                    Lihat Website Utama
                                    <svg class="lucide lucide-arrow-up-right" xmlns="http://www.w3.org/2000/svg"
                                        width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M7 7h10v10"></path>
                                        <path d="M7 17 17 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img">
                        <img class="img-main img-fluid" src="/img/hero-1.png" alt="Hero Image" data-aos="fade-in"
                            data-aos-delay="500">
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
